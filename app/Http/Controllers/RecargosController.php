<?php

namespace App\Http\Controllers;

use App\Colaboradore;
use App\Feriado;
use App\HorasEntrada;
use App\HorasLaborada;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RecargosController extends Controller
{
    public function run()
    {
        $colaboradores = Colaboradore::all();
        foreach ($colaboradores as $colaborador) {
            $ultima_semana = $this->getUltimaSemana();
            $horas_entrada = $this->getHorasEntrada($colaborador->id, $ultima_semana);
            $horas_laboradas = $this->getSumaHorasLaboradas($colaborador->id, $ultima_semana);
            $dias_nacionales = $this->getDiasNacionales($ultima_semana);
//            echo "<pre>";
//            print_r($horas_entrada);
//            print_r($horas_laboradas);
//            print_r($dias_nacionales);
//            echo "</pre>";
//            echo '<h2>Colaborador: ' . $colaborador->nombre . '</h2>';
//            $this->printCabeceras();
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
                die;
//                foreach ($data_for_output as $fecha) {
//                    $this->printBody($fecha);
//                }

            }

            $this->printPie();
        }
    }

    public function printCabeceras()
    {
        //IMPRESION DEL HEADER DE LA TABLA
        echo("<table width='100%' border='1'>");
        echo("<tr>");
        echo("<td valign='top' bgcolor='#FFFF00'  align='center' colspan=9>");
        echo("Horas trabajadas");
        echo("</td>");
        echo("<td valign='top' bgcolor='#00FFFF' align='center' colspan=15>");
        echo("Clasificacion de recargos de horas trabajadas");
        echo("</td>");
        echo("</tr>");
        echo("<tr>");
        echo("<td valign='top' bgcolor='#FFC039'>");
        echo("Dia");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#FFC039'>");
        echo("Hora de entrada");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#FFC039'>");
        echo("Horas regulares");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#FFC039'>");
        echo("Hora de salida reg.");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#FFC039'>");
        echo("Horas extra");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#FFC039'>");
        echo("Horas trabajadas");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#FFC039'>");
        echo("Horas diurno");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#FFC039'>");
        echo("Horas nocturno");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#FFC039'>");
        echo("H. extra acumuladas");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 1.00");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 1.25");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 1.50");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 1.88");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 2.00");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 2.18");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 2.25");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 2.50");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 2.63");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 3.00");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 3.12");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 3.28");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 3.75");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 3.94");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 5.47");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#71DA73'>");
        echo("Horas a 6.56");
        echo("</td>");
        echo("</tr>");
    }

    public function printBody($data)
    {
        $dia_de_la_semana = 0;
        $hora_de_entrada = 0;
        $horas_regulares = 0;
        $hora_de_salida = 0;
        $horas_extra = 0;
        $horas_antes_de_6 = 0;
        $horas_despues_de_6 = 0;
        $horas_acumuladas = 0;
        $C_1_00 = 0;
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
        extract($data);
        echo("<tr>");
        echo("<td valign='top' bgcolor='#D3D2D0'>");
        echo($dia_de_la_semana);
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
        echo($hora_de_entrada);
        echo(":00 A.M.");
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
        echo($horas_regulares);
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
        echo($hora_de_salida);
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
        echo($horas_extra);
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
        echo(($horas_regulares + $horas_extra));
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
        echo($horas_antes_de_6);
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
        echo($horas_despues_de_6);
        echo("</td>");
        echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
        echo($horas_acumuladas);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_1_00']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_1_25']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_1_50']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_1_88']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_2_00']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_2_18']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_2_25']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_2_50']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_2_63']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_3_00']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_3_12']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_3_28']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_3_75']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_3_94']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_5_47']);
        echo("</td>");
        echo("<td valign='top' align='center'>");
        echo($recargos['C_6_56']);
        echo("</td>");
        echo("</tr>");
    }

    public function printPie()
    {
        echo("</table>");
    }

    public function getUltimaSemana()
    {
        $dt = new Carbon('last sunday');
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

    public function storeRecargos($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function getDiasNacionales($semana)
    {
        $feriados = Feriado::whereIn('fecha', $semana)->get();
        $data = array_fill_keys($semana, '');
        foreach ($feriados as $feriado) {
            foreach ($semana as $dia) {
                if ($feriado->fecha === $dia) {
                    $data[$dia] = true;
                }
            }
        }
        return $data;
    }

    public function process($fecha, $hora_de_entrada, $horas_laboradas, $dia_nacional = false, &$tiempo_compensatorio, &$horas_acumuladas, &$dias_a_compensar_por_no_dar_compensatorio)
    {
//        print_r($horas_laboradas);
//        echo '<br>';
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
