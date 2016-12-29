<?php

namespace App\Jobs;

use App\Colaboradore;
use App\Feriado;
use App\HorasEntrada;
use App\HorasLaborada;
use App\HorasLaboradasDetalle;
use App\HorasLaboradasRecargo;
use App\Mail\SemanaError;
use App\Mail\SemanaProcessed;
use App\SemanasProcesada;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ProcessHorasRecargos implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Consultado ultimas semanas');
        $today = Carbon::now();
        if ($today->dayOfWeek < 3) { // 3 = Miercoles
            Log::info('Aun no es posible calcular los recargos, debe ser dia miercoles en adelante');
        } else {
            $older_domingo = $this->getOlderDomingo();
            $latest_domingo = $this->getLatestDomingo();
            while ($older_domingo->diffInDays($latest_domingo, false) >= 0) {
                DB::beginTransaction();
                $html_for_mail = '';
                $ultima_semana = $this->getSemana($older_domingo);

                // Check if the current week has been processed in the past
                $dt = Carbon::parse($ultima_semana[1]); // 1 = Monday (to get the real week number of year
                $numero_semana = $dt->weekOfYear;
                $anio = $dt->year;
                $semana = $this->storeSemanaProcesada($numero_semana, $anio);
                if ($semana) {
                    Log::info('Procesando Semana ' . ($numero_semana) . ' (' . $anio . ')...');
                    $colaboradores = Colaboradore::all();
                    foreach ($colaboradores as $colaborador) {
                        $horas_entrada = $this->getHorasEntrada($colaborador->id, $ultima_semana);
                        $horas_laboradas = $this->getSumaHorasLaboradas($colaborador->id, $ultima_semana);
                        $dias_nacionales = $this->getDiasNacionales($ultima_semana);
                        if (config('app.send_mail_with_semana_procesada')) {
                            $html_for_mail .= '<h3>Colaborador: ' . $colaborador->nombre . '</h3>';
                            $html_for_mail .= $this->getHtmlCabeceras();
                        }
                        $tiempo_compensatorio = 0;
                        $horas_entras_acumuladas = 0;
                        $dias_a_compensar_por_no_dar_compensatorio = 0;
                        $data_for_output = [];
                        foreach ($ultima_semana as $key => $fecha) {
                            $data_for_output[$fecha] = $this->process($fecha, $horas_entrada[$fecha], $horas_laboradas[$fecha], $dias_nacionales[$fecha], $tiempo_compensatorio, $horas_entras_acumuladas, $dias_a_compensar_por_no_dar_compensatorio);
                        }

                        if (sizeof($data_for_output) > 0) {
                            foreach ($ultima_semana as $key => $fecha) {
                                $dt = Carbon::parse($fecha);
                                if (array_key_exists($fecha, $dias_nacionales) && array_key_exists($fecha, $data_for_output) && !$dias_nacionales[$fecha] && $dt->dayOfWeek !== 0) {
                                    if ($dias_a_compensar_por_no_dar_compensatorio > 0) {
                                        $data_for_output[$fecha]['recargos']['C_1_88'] = $data_for_output[$fecha]['recargos']['C_1_88'] + $data_for_output[$fecha]['recargos']['C_1_25'];
                                        $data_for_output[$fecha]['recargos']['C_1_25'] = 0;
                                        $data_for_output[$fecha]['recargos']['C_2_25'] = $data_for_output[$fecha]['recargos']['C_2_25'] + $data_for_output[$fecha]['recargos']['C_1_50'];
                                        $data_for_output[$fecha]['recargos']['C_1_50'] = 0;
                                        $data_for_output[$fecha]['recargos']['C_3_28'] = $data_for_output[$fecha]['recargos']['C_3_28'] + $data_for_output[$fecha]['recargos']['C_2_18'];
                                        $data_for_output[$fecha]['recargos']['C_2_18'] = 0;
                                        $data_for_output[$fecha]['recargos']['C_3_94'] = $data_for_output[$fecha]['recargos']['C_3_94'] + $data_for_output[$fecha]['recargos']['C_2_63'];
                                        $data_for_output[$fecha]['recargos']['C_2_63'] = 0;
                                        $dias_a_compensar_por_no_dar_compensatorio = $dias_a_compensar_por_no_dar_compensatorio - 1;
                                    }
                                }
                            }
                            $todas_horas_laboradas = $this->getHorasLaboradas($colaborador->id, $ultima_semana);
                            $data_for_save = $this->prepareData($data_for_output, $todas_horas_laboradas);

                            $this->storeRecargos($data_for_save);
                            if (config('app.send_mail_with_semana_procesada')) {
                                foreach ($data_for_output as $fecha) {
                                    $html_for_mail .= $this->getHtmlBody($fecha);
                                }
                            }

                        }
                        if (config('app.send_mail_with_semana_procesada')) {
                            $html_for_mail .= $this->getHtmlPie();
                        }
                    }
                    Log::info('Fin procesado semana ' . ($numero_semana) . ' (' . $anio . ')');
                    $message = (new SemanaProcessed($semana, $html_for_mail));
                    Mail::to(config('app.notification_mail'))->queue($message);
                    DB::commit();

                } else {
                    DB::rollBack();
                    $error = 'La semana ' . ($numero_semana) . ' (' . $anio . ')' . ' ya ha sido procesada';
                    Log::error($error);
                    $message = (new SemanaError());
                    Mail::to(config('app.notification_mail'))->queue($message);
                }
                $older_domingo = $older_domingo->addWeek();
            }
        }
        Log::info('***Fin Procesamiento Semana***');
    }

    public function getHtmlCabeceras()
    {
        $html = '';
        //IMPRESION DEL HEADER DE LA TABLA
        $html .= "<table width='100%' border='1'>";
        $html .= "<tr>";
        $html .= "<td valign='top' bgcolor='#FFFF00'  align='center' colspan=9>";
        $html .= "Horas trabajadas";
        $html .= "</td>";
        $html .= "<td valign='top' bgcolor='#00FFFF' align='center' colspan=15>";
        $html .= "Clasificacion de recargos de horas trabajadas";
        $html .= "</td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= "<td valign='top' bgcolor='#FFC039'>";
        $html .= "Dia";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#FFC039'>";
        $html .= "Hora de entrada";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#FFC039'>";
        $html .= "Horas regulares";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#FFC039'>";
        $html .= "Hora de salida reg.";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#FFC039'>";
        $html .= "Horas extra";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#FFC039'>";
        $html .= "Horas trabajadas";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#FFC039'>";
        $html .= "Horas diurno";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#FFC039'>";
        $html .= "Horas nocturno";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#FFC039'>";
        $html .= "H. extra acumuladas";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 1.00";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 1.25";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 1.50";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 1.88";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 2.00";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 2.18";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 2.25";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 2.50";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 2.63";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 3.00";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 3.12";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 3.28";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 3.75";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 3.94";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 5.47";
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#71DA73'>";
        $html .= "Horas a 6.56";
        $html .= "</td>";
        $html .= "</tr>";

        return $html;
    }

    public function getHtmlBody($data)
    {
        $html = '';
        $dia_de_la_semana = 0;
        $hora_de_entrada = 0;
        $horas_regulares = 0;
        $hora_de_salida = 0;
        $horas_extra = 0;
        $horas_antes_de_6 = 0;
        $horas_despues_de_6 = 0;
        $horas_acumuladas = 0;
        extract($data);
        $hora_entrada = floor($hora_de_entrada);
        $minutos_entrada = $hora_de_entrada - $hora_entrada;
        $minutos_entrada = $minutos_entrada * 60;
        if ($minutos_entrada < 10) {
            $minutos_entrada = "0" . $minutos_entrada;
        }
        $html .= "<tr>";
        $html .= "<td valign='top' bgcolor='#D3D2D0'>";
        $html .= $dia_de_la_semana;
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#D3D2D0'>";
        $html .= $hora_entrada . ':' . $minutos_entrada;
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#D3D2D0'>";
        $html .= $horas_regulares;
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#D3D2D0'>";
        $html .= $hora_de_salida;
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#D3D2D0'>";
        $html .= $horas_extra;
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#D3D2D0'>";
        $html .= ($horas_regulares + $horas_extra);
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#D3D2D0'>";
        $html .= $horas_antes_de_6;
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#D3D2D0'>";
        $html .= $horas_despues_de_6;
        $html .= "</td>";
        $html .= "<td valign='top' align='center' bgcolor='#D3D2D0'>";
        $html .= $horas_acumuladas;
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_1_00'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_1_25'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_1_50'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_1_88'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_2_00'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_2_18'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_2_25'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_2_50'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_2_63'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_3_00'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_3_12'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_3_28'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_3_75'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_3_94'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_5_47'];
        $html .= "</td>";
        $html .= "<td valign='top' align='center'>";
        $html .= $recargos['C_6_56'];
        $html .= "</td>";
        $html .= "</tr>";
        return $html;
    }

    public function getHtmlPie()
    {
        return "</table>";
    }

    public function storeSemanaProcesada($semana, $anio)
    {
        $semana_procesada = SemanasProcesada::where('semana', '=', $semana)
            ->where('anio', '=', $anio)->get();
        if (sizeof($semana_procesada->toArray()) > 0) {
            return false;
        } else {
            $semana_procesada = new SemanasProcesada();
            $semana_procesada->semana = $semana;
            $semana_procesada->anio = $anio;
            $semana_procesada->save();
        }

        return $semana_procesada;
    }

    public function getOlderDomingo()
    {
        $domingo = false;
        $older = SemanasProcesada::orderBy('semana', 'desc')->limit(1)->get();
        foreach ($older as $oldone) {
            $dt = Carbon::parse($oldone->anio . 'W' . ($oldone->semana + 1));
            Carbon::setTestNow($dt);
            $domingo = new Carbon('next sunday');
            Carbon::setTestNow(); // Clearing now
        }

        if (!$domingo) {
            $domingo = new Carbon('this sunday');
            $older = HorasLaboradasDetalle::orderBy('fecha_laborada')->limit(1)->get();
            foreach ($older as $fecha) {
                $dt = Carbon::parse($fecha->fecha_laborada);
                Carbon::setTestNow($dt);
                $domingo = new Carbon('next sunday');
                Carbon::setTestNow(); // Clearing now
            }
        }
        return $domingo;
    }

    public function getLatestDomingo()
    {
        $domingo = new Carbon('last sunday');
        return $domingo;
    }

    public function getSemana($dt)
    {
        $dt = $dt->subWeek();
        for ($i = 0; $i < 7; $i++) {
            $semana[] = $dt->format('Y-m-d');
            $dt = $dt->addDay(1);
        }
        return $semana;
    }

    public function getHorasEntrada($colaborador_id, $semana)
    {
        $horas = [];
        $horas_entrada = HorasEntrada::where('colaborador_id', $colaborador_id)
            ->whereIn('fecha_entrada', $semana)
            ->orderBy('fecha_entrada')
            ->get();
        foreach ($horas_entrada as $hora_entrada) {
            $horas[$hora_entrada->fecha_entrada] = /*$hora_entrada->id . ' = ' .*/
                $this->getHorasInDecimal($hora_entrada->hora_entrada);
        };

        foreach ($semana as $dia) {
            if (!array_key_exists($dia, $horas)) {
                $horas[$dia] = '';
            }
        }

        ksort($horas);
        return $horas;
    }

    public function getHorasInDecimal($hora)
    {
        $hora = explode(':', $hora);
        $minutos = intval($hora[1]);
        $hora = intval($hora[0]);
        $minutos = $minutos / 60;
        return number_format($hora + $minutos, 2);
    }

    public function getSumaHorasLaboradas($colaborador_id, $semana)
    {
        $horas_laboradas_detalles = HorasLaborada::rightJoin('horas_laboradas_detalles', 'horas_laboradas_detalles.horas_laborada_id', '=', 'horas_laboradas.id')
            ->whereIn('horas_laboradas_detalles.fecha_laborada', $semana)
            ->select('horas_laboradas_detalles.fecha_laborada', DB::raw('SUM(horas_laboradas_detalles.horas_laboradas) as total'))
            ->where('horas_laboradas.colaborador_id', $colaborador_id)
            ->orderBy('horas_laboradas_detalles.fecha_laborada')
            ->groupBy(['horas_laboradas_detalles.fecha_laborada'])
            ->get();

        $horas = [];
        foreach ($horas_laboradas_detalles as $detalle) {
            $horas[$detalle->fecha_laborada] = $detalle->total;
        }

        foreach ($semana as $dia) {
            if (!array_key_exists($dia, $horas)) {
                $horas[$dia] = '';
            }
        }

        ksort($horas);
        return $horas;
    }

    public function getHorasLaboradas($colaborador_id, $semana)
    {
        $horas_laboradas_detalles = HorasLaborada::rightJoin('horas_laboradas_detalles', 'horas_laboradas_detalles.horas_laborada_id', '=', 'horas_laboradas.id')
            ->whereIn('horas_laboradas_detalles.fecha_laborada', $semana)
            ->select('horas_laboradas.*', 'horas_laboradas_detalles.fecha_laborada', 'horas_laboradas_detalles.horas_laboradas')
            ->where('horas_laboradas.colaborador_id', $colaborador_id)
            ->orderBy('horas_laboradas_detalles.fecha_laborada')
            ->get();

        $horas = [];
        foreach ($horas_laboradas_detalles as $detalle) {
            $horas[$detalle->fecha_laborada][] = $detalle->toArray();
        }
        return $horas;
    }

    public function prepareData($recargos, $horas)
    {
        $data = [];
        foreach ($recargos as $fecha => $recargo) {
            $horas_recargos = array_filter($recargo['recargos'], function ($var) {
                return $var > 0;
            });

            foreach ($horas_recargos as $codigo => $hora_recargo) {
                $current_horas = $hora_recargo;
                // Calculo horas regulares
                foreach ($horas[$fecha] as $hora) {
                    if ($current_horas <= 0) {
                        continue;
                    }
                    if ($current_horas > $hora['horas_laboradas']) {
                        $current_horas -= $hora['horas_laboradas'];
                        $horas_laboradas = $hora['horas_laboradas'];
                    } else {
                        $horas_laboradas = $current_horas;
                        $current_horas = 0;
                    }

                    $data[$fecha][] = array_merge([
                        'horas_recargo' => $horas_laboradas,
                        'codigo' => $codigo,
                    ], $hora);
                }
            }
        }
        return $data;
    }

    public function storeRecargos($recargos)
    {

        foreach ($recargos as $recargo) {
            foreach ($recargo as $data) {
                $horas_recargo = new HorasLaboradasRecargo();
                $horas_recargo->fecha_laborada = $data['fecha_laborada'];
                $horas_recargo->horas_laboradas = $data['horas_recargo'];
                $horas_recargo->codigo_recargo = $data['codigo'];
                $horas_recargo->horas_laborada_id = $data['id'];
                $horas_recargo->colaborador_id = $data['colaborador_id'];
                $horas_recargo->planilla_id = $data['planilla_id'];
                $horas_recargo->cuenta_costo_id = $data['cuenta_costo_id'];
                $horas_recargo->beneficio_id = $data['beneficio_id'];
                $horas_recargo->cuenta_beneficio_id = $data['cuenta_beneficio_id'];
                try {
                    $horas_recargo->save();
                } catch (Exception $e) {
                    $error = 'Error: ' . $e->getMessage();
                    Log::error($error);
                    $message = (new SemanaError());
                    Mail::to(config('app.notification_mail'))->queue($message);
                    DB::rollBack();
                }
            }
        }
    }

    public function getDiasNacionales($semana)
    {
        $feriados = Feriado::all();
        $year = date('Y');
        $data = array_fill_keys($semana, '');
        foreach ($feriados as $feriado) {
            foreach ($semana as $dia) {
                $fecha = $year . '-' .$feriado->fecha;
                if ($fecha === $dia) {
                    $data[$dia] = true;
                }
            }
        }
        return $data;
    }

    public function process($fecha, $hora_de_entrada, $horas_laboradas, $dia_nacional = false, &$tiempo_compensatorio, &$horas_acumuladas, &$dias_a_compensar_por_no_dar_compensatorio)
    {
        $dt = Carbon::parse($fecha);
        $es_domingo = ($dt->dayOfWeek === 0);
        $es_sabado = ($dt->dayOfWeek === 6);
        $dia_de_la_semana = ($dt->format('l'));

        //INICIALIZACION DE VARIABLES
        if ($horas_laboradas >= 8) {
            $horas_regulares = 8;
            $horas_extra = ($horas_laboradas - 8);
        } elseif ($horas_laboradas > 0) {
            $horas_regulares = $horas_laboradas;
            $horas_extra = 0;
        } else {
            $horas_regulares = 0;
            $horas_extra = 0;
        }
        $horas_antes_de_6 = 0;
        $horas_despues_de_6 = 0;
        $hora_de_salida = 0;
        $horas_entre_salida_ylas_6 = 0;
        $horas_de_recargo = 0;
        $C_1_00 = $horas_regulares; //LAS HORAS A 1.0 LAS INICIALIZA CON LAS HORAS REGULARES TRABAJADAS
        $C_1_25 = 0;
        $C_1_50 = 0;
        $C_1_88 = 0;
        $C_2_00 = 0;
        $C_2_18 = 0;
        $C_2_25 = 0;
        $C_2_50 = 0;
        $C_2_63 = 0;
        $C_3_00 = 0;
        $C_3_12 = 0;
        $C_3_28 = 0;
        $C_3_75 = 0;
        $C_3_94 = 0;
        $C_5_47 = 0;
        $C_6_56 = 0;

        //CLASIFICACION DE HORAS
        //DETERMINA HORA DE SALIDA Y DEFINE HORAS ENTRE LA SALIDA Y LAS 6 PM
        if ($horas_regulares == 0) {
            $hora_de_salida = 0;
        } else {
            $hora_de_salida = $hora_de_entrada + $horas_regulares + 0.5;
        }
        $horas_entre_salida_ylas_6 = 18 - $hora_de_salida;

        //ACUMULA LAS HORAS EXTRA EN LA VARIABLE DE HORAS_ACUMULADAS
        if ($es_domingo) {
            $horas_acumuladas = $horas_extra;
        } else {
            $horas_acumuladas += $horas_extra;
        }

        //DETERMINA CANTIDAD DE HORAS EXTRA DIURNAS Y HORAS EXTRA NOCTURNAS
        if ($horas_entre_salida_ylas_6 <= 0) {
            $horas_antes_de_6 = 0;
            $horas_despues_de_6 = $horas_extra;
        } else {
            if ($horas_extra < $horas_entre_salida_ylas_6) {
                $horas_antes_de_6 = $horas_extra;
            } else {
                $horas_antes_de_6 = $horas_entre_salida_ylas_6;
                $horas_despues_de_6 = $horas_extra - $horas_entre_salida_ylas_6;
            }
        }

        //REVISA SI ES SABADO, EN ESE CASO PASA TODAS LAS HORAS A NOCTURNO
        if ($es_sabado) {
            $horas_despues_de_6 = $horas_despues_de_6 + $horas_antes_de_6;
            $horas_antes_de_6 = 0;
        }

        //CREA VARIABLES DE HORAS POR CLASIFICAR PARA DIURNO Y NOCTURNO
        $horas_antes_de_6_por_clasificar = $horas_antes_de_6;
        $horas_despues_de_6_por_clasificar = $horas_despues_de_6;

        //DETERMINA LA CANTIDAD DE HORAS QUE VAN CON RECARGO POR RECLASIFICAR
        if ($horas_acumuladas > 9) {
            $horas_de_recargo = $horas_de_recargo + ($horas_acumuladas - 9);
        } elseif ($horas_extra > 3) {
            $horas_de_recargo = $horas_de_recargo + ($horas_extra - 3);
        }


        //AQUI INICIA LA CLASIFICACION DE HORAS EXTRA NOCTURNAS CON RECARGO ACORDE A LA CANTIDAD DE HORAS QUE VAN CON RECARGO
        if ($horas_de_recargo > 0) {
            if ($horas_de_recargo >= $horas_despues_de_6) {
                $C_2_63 = $C_2_63 + $horas_despues_de_6;
                $horas_de_recargo = $horas_de_recargo - $horas_despues_de_6;
                $horas_despues_de_6_por_clasificar = 0;
            } else {
                $C_2_63 = $C_2_63 + $horas_de_recargo;
                $horas_despues_de_6_por_clasificar = $horas_despues_de_6_por_clasificar - $horas_de_recargo;
                $horas_de_recargo = 0;
            }
        }

        //AQUI INICIA LA CLASIFICACION DE HORAS EXTRA DIURNAS CON RECARGO ACORDE A LA CANTIDAD DE HORAS QUE VAN CON RECARGO
        if ($horas_de_recargo > 0) {
            if ($horas_de_recargo >= $horas_antes_de_6) {
                $C_2_18 = $C_2_18 + $horas_antes_de_6;
                $horas_de_recargo = $horas_de_recargo - $horas_antes_de_6;
                $horas_antes_de_6_por_clasificar = 0;
            } else {
                $C_2_18 = $C_2_18 + $horas_de_recargo;
                $horas_antes_de_6_por_clasificar = $horas_antes_de_6_por_clasificar - $horas_de_recargo;
                $horas_de_recargo = 0;
            }
        }

        //LAS HORAS QUE NO SE CLASIFICARON CON RECARGO ADICIONAL SE CLASIFICAN CON EL MINIMO RECARGO
        $C_1_25 = $horas_antes_de_6_por_clasificar;
        $C_1_50 = $horas_despues_de_6_por_clasificar;


        //CONTEO DE DIAS DE LA SEMANA NO TRABAJADOS PARA DETERMINAR SI HUBIERON DIAS COMPENSATORIOS

        if ($C_1_00 == 0) {
            $tiempo_compensatorio = $tiempo_compensatorio + 1;
        }

        //RECLASIFICACION DE HORAS DE DOMINGO
        if ($es_domingo && $C_1_00 > 0) {
            $C_1_25 = 0;
            $C_1_50 = 0;
            $C_1_88 = 0;
            $C_2_00 = 0;
            $C_2_25 = 0;
            $C_2_18 = 0;
            $C_2_63 = 0;
            $C_3_00 = 0;
            $C_3_12 = 0;
            $C_3_28 = 0;
            $C_3_75 = 0;
            $C_3_94 = 0;
            $C_5_47 = 0;
            $C_6_56 = 0;
            if ($tiempo_compensatorio >= 1) {
                $C_1_50 = $C_1_00;
                $C_1_00 = 0;
                $tiempo_compensatorio = $tiempo_compensatorio - 1;
            } else {
                $dias_a_compensar_por_no_dar_compensatorio = $dias_a_compensar_por_no_dar_compensatorio + 1;
                $C_2_00 = $C_1_00;
                $C_1_00 = 0;
            }
            if ($horas_extra > 1) {
                $C_2_25 = 1;
                $C_3_94 = $horas_extra - 1;
            } else {
                $C_2_25 = $horas_extra;
            }
        }

        //RECLASIFICACION DE HORAS EN DIAS NACIONALES
        if (($dia_nacional) && !$es_domingo) {
            $C_2_50 = $C_2_50 + $C_1_00;
            $C_1_00 = 0;
            $C_3_12 = $C_3_12 + $C_1_25;
            $C_1_25 = 0;
            $C_3_75 = $C_3_75 + $C_1_50;
            $C_1_50 = 0;
            $C_5_47 = $C_5_47 + $C_2_18;
            $C_2_18 = 0;
            $C_6_56 = $C_6_56 + $C_2_63;
            $C_2_63 = 0;
            if ($tiempo_compensatorio >= 1) {
                $tiempo_compensatorio - 1;
            } else {
                $dias_a_compensar_por_no_dar_compensatorio = $dias_a_compensar_por_no_dar_compensatorio + 1;
                $C_3_00 = $C_3_00 + $C_2_50;
                $C_2_50 = 0;
            }
        }

        //RECLASIFICACION DE HORAS POR TIEMPOS COMPENSATORIOS NO OTORGADOS PARA DIAS NACIONALES (PRIMERO ENCONTRANDO DIAS QUE NO SEAN FERIADOS DONDE SE PUEDAN CLASIFICAR)
        return [
            'dia_de_la_semana' => $dia_de_la_semana,
            'hora_de_entrada' => $hora_de_entrada,
            'horas_regulares' => $horas_regulares,
            'hora_de_salida' => $hora_de_salida,
            'horas_extra' => $horas_extra,
            'regulares_mas_extra' => $horas_regulares + $horas_extra,
            'horas_antes_de_6' => $horas_antes_de_6,
            'horas_despues_de_6' => $horas_despues_de_6,
            'horas_acumuladas' => $horas_acumuladas,
            'horas_acumuladas' => $horas_acumuladas,
            'dia_nacional' => $dia_nacional,
            'es_domingo' => $es_domingo,
            'tiempo_compensatorio' => $tiempo_compensatorio,
            'recargos' => [
                'C_1_00' => $C_1_00,
                'C_1_25' => $C_1_25,
                'C_1_50' => $C_1_50,
                'C_1_88' => $C_1_88,
                'C_2_00' => $C_2_00,
                'C_2_18' => $C_2_18,
                'C_2_25' => $C_2_25,
                'C_2_50' => $C_2_50,
                'C_2_63' => $C_2_63,
                'C_3_00' => $C_3_00,
                'C_3_12' => $C_3_12,
                'C_3_28' => $C_3_28,
                'C_3_75' => $C_3_75,
                'C_3_94' => $C_3_94,
                'C_5_47' => $C_5_47,
                'C_6_56' => $C_6_56
            ]
        ];
    }
}
