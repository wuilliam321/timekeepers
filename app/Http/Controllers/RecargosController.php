<?php

namespace App\Http\Controllers;

use App\HorasEntrada;
use App\HorasLaborada;
use Illuminate\Http\Request;

use App\Http\Requests;

class RecargosController extends Controller
{
    public function run()
    {
        $colaborador_id = '5655'; // Jose Hernandez
        $horas = $this->getUltimaSemana($colaborador_id);
        $this->process($this->prepareToBeProcessed($horas));
    }

    public function getUltimaSemana($colaborador_id)
    {
        $ultima_semana['hora_de_entrada'] = $this->getHorasEntrada($colaborador_id);
        $ultima_semana['horas_laboradas'] = $this->getHorasLaboradas($colaborador_id);
        $ultima_semana['dia_nacional'] = $this->getDiasNacionales($ultima_semana['hora_de_entrada']);
        return $ultima_semana;
    }

    public function getHorasEntrada($colaborador_id)
    {
        $horas = [];
        $horas_entrada = HorasEntrada::where('colaborador_id', $colaborador_id)->get();
        foreach ($horas_entrada as $hora_entrada) {
            $horas[$hora_entrada->fecha_entrada][] = $this->getHorasInDecimal($hora_entrada->hora_entrada);
        };

        return $horas;
    }

    public function getHorasInDecimal($hora)
    {
        $hora = explode(':', $hora);
        $minutos = intval($hora[1]);
        $hora = intval($hora[0]);
        $minutos = $minutos / 60;
        return $hora + $minutos;
    }

    public function getHorasLaboradas($colaborador_id)
    {
        $horas = [];
        $horas_laboradas = HorasLaborada::with('horas_laboradas_detalles')
            ->where('colaborador_id', $colaborador_id)
            ->get();

        foreach ($horas_laboradas as $hora_laborada) {
            foreach ($hora_laborada->horas_laboradas_detalles as $horas_laboradas_detalle) {
                $horas[$horas_laboradas_detalle->fecha_laborada][] = $horas_laboradas_detalle->horas_laboradas;
            }
        };

        return $horas;
    }

    public function getDiasNacionales($horas_entrada)
    {
        $feriados = [];
        $fechas = array_keys($horas_entrada);
        foreach ($fechas as $fecha) {
            $feriados[$fecha][] = 0;
        }

        return $feriados;
    }

    public function prepareToBeProcessed($horas)
    {
        return [
            'hora_de_entrada' => array_flatten($horas['hora_de_entrada']),
            'horas_laboradas' => array_flatten($horas['horas_laboradas']),
            'dia_nacional' => array_flatten($horas['dia_nacional'])
        ];
    }

    public function process($horas)
    {
        //RECEPCION DE VARIABLES DESDE FORMULARIO
        $hora_de_entrada = $horas['hora_de_entrada'];
        $horas_laboradas = $horas['horas_laboradas'];
        $dia_nacional = $horas['dia_nacional'];
        $dias_a_compensar_por_no_dar_compensatorio = 0;
        $trabajo_domingo = 0;
        $tiempo_compensatorio = 0;
        $dia_nacional[0] = 0;
        $dia_de_la_semana[0] = "Domingo";
        $dia_de_la_semana[1] = "Lunes";
        $dia_de_la_semana[2] = "Martes";
        $dia_de_la_semana[3] = "Miercoles";
        $dia_de_la_semana[4] = "Jueves";
        $dia_de_la_semana[5] = "Viernes";
        $dia_de_la_semana[6] = "Sabado";

        //INICIALIZACION DE VARIABLES
        $d=0;
        while ($d<7) {
            if ($horas_laboradas[$d] >= 8) {$horas_regulares[$d] = 8; $horas_extra[$d] = ($horas_laboradas[$d] - 8);}
            elseif ($horas_laboradas[$d] > 0) {$horas_regulares[$d] = $horas_laboradas[$d]; $horas_extra[$d] = 0;}
            else {$horas_regulares[$d] = 0; $horas_extra[$d] = 0;}
            $horas_antes_de_6[$d] = 0;
            $horas_despues_de_6[$d] = 0;
            $hora_de_salida[$d] = 0;
            $horas_entre_salida_ylas_6[$d] = 0;
            $horas_de_recargo[$d] = 0;
            $C_1_00[$d] = $horas_regulares[$d]; //LAS HORAS A 1.0 LAS INICIALIZA CON LAS HORAS REGULARES TRABAJADAS
            $C_1_25[$d] = 0;
            $C_1_50[$d] = 0;
            $C_1_88[$d] = 0;
            $C_2_00[$d] = 0;
            $C_2_18[$d] = 0;
            $C_2_25[$d] = 0;
            $C_2_50[$d] = 0;
            $C_2_63[$d] = 0;
            $C_3_00[$d] = 0;
            $C_3_12[$d] = 0;
            $C_3_28[$d] = 0;
            $C_3_75[$d] = 0;
            $C_3_94[$d] = 0;
            $C_5_47[$d] = 0;
            $C_6_56[$d] = 0;
            $d=$d+1;
        }

        //CLASIFICACION DE HORAS
        $d=0;
        while ($d<7) {
            //DETERMINA HORA DE SALIDA Y DEFINE HORAS ENTRE LA SALIDA Y LAS 6 PM
            if ($horas_regulares[$d] == 0) {$hora_de_salida[$d] = 0;} else {$hora_de_salida[$d] = $hora_de_entrada[$d] + $horas_regulares[$d] + 0.5;}
            $horas_entre_salida_ylas_6[$d] = 18-$hora_de_salida[$d];

            //ACUMULA LAS HORAS EXTRA EN LA VARIABLE DE HORAS_ACUMULADAS
            if($d == 0) {$horas_acumuladas[$d] = $horas_extra[$d];} else {$horas_acumuladas[$d] = $horas_acumuladas[$d-1] + $horas_extra[$d];}

            //DETERMINA CANTIDAD DE HORAS EXTRA DIURNAS Y HORAS EXTRA NOCTURNAS
            if ($horas_entre_salida_ylas_6[$d] <= 0) {
                $horas_antes_de_6[$d] = 0;
                $horas_despues_de_6[$d] = $horas_extra[$d];
            } else {
                if ($horas_extra[$d] < $horas_entre_salida_ylas_6[$d]) {
                    $horas_antes_de_6[$d] = $horas_extra[$d];
                } else {
                    $horas_antes_de_6[$d] = $horas_entre_salida_ylas_6[$d];
                    $horas_despues_de_6[$d] = $horas_extra[$d] - $horas_entre_salida_ylas_6[$d];
                }
            }

            //REVISA SI ES SABADO, EN ESE CASO PASA TODAS LAS HORAS A NOCTURNO
            if ($d == 6) {$horas_despues_de_6[$d] = $horas_despues_de_6[$d] + $horas_antes_de_6[$d]; $horas_antes_de_6[$d] = 0;}

            //CREA VARIABLES DE HORAS POR CLASIFICAR PARA DIURNO Y NOCTURNO
            $horas_antes_de_6_por_clasificar[$d] = $horas_antes_de_6[$d];
            $horas_despues_de_6_por_clasificar[$d] = $horas_despues_de_6[$d];

            //DETERMINA LA CANTIDAD DE HORAS QUE VAN CON RECARGO POR RECLASIFICAR
            if($horas_acumuladas[$d] > 9) {$horas_de_recargo[$d] = $horas_de_recargo[$d] + ($horas_acumuladas[$d] - 9);}
            elseif ($horas_extra[$d] > 3) {$horas_de_recargo[$d] = $horas_de_recargo[$d] + ($horas_extra[$d] - 3);}



            //AQUI INICIA LA CLASIFICACION DE HORAS EXTRA NOCTURNAS CON RECARGO ACORDE A LA CANTIDAD DE HORAS QUE VAN CON RECARGO
            if($horas_de_recargo[$d] > 0) {
                if($horas_de_recargo[$d] >= $horas_despues_de_6[$d]) {
                    $C_2_63[$d] = $C_2_63[$d] + $horas_despues_de_6[$d];
                    $horas_de_recargo[$d] = $horas_de_recargo[$d] - $horas_despues_de_6[$d];
                    $horas_despues_de_6_por_clasificar[$d] = 0;
                } else {
                    $C_2_63[$d] = $C_2_63[$d] + $horas_de_recargo[$d];
                    $horas_despues_de_6_por_clasificar[$d] = $horas_despues_de_6_por_clasificar[$d] - $horas_de_recargo[$d];
                    $horas_de_recargo[$d] = 0;
                }
            }

            //AQUI INICIA LA CLASIFICACION DE HORAS EXTRA DIURNAS CON RECARGO ACORDE A LA CANTIDAD DE HORAS QUE VAN CON RECARGO
            if($horas_de_recargo[$d] > 0) {
                if($horas_de_recargo[$d] >= $horas_antes_de_6[$d]) {
                    $C_2_18[$d] = $C_2_18[$d] + $horas_antes_de_6[$d];
                    $horas_de_recargo[$d] = $horas_de_recargo[$d] - $horas_antes_de_6[$d];
                    $horas_antes_de_6_por_clasificar[$d] = 0;
                } else {
                    $C_2_18[$d] = $C_2_18[$d] + $horas_de_recargo[$d];
                    $horas_antes_de_6_por_clasificar[$d] = $horas_antes_de_6_por_clasificar[$d] - $horas_de_recargo[$d];
                    $horas_de_recargo[$d] = 0;
                }
            }

            //LAS HORAS QUE NO SE CLASIFICARON CON RECARGO ADICIONAL SE CLASIFICAN CON EL MINIMO RECARGO
            $C_1_25[$d] = $horas_antes_de_6_por_clasificar[$d];
            $C_1_50[$d] = $horas_despues_de_6_por_clasificar[$d];

            $d=$d+1;
        }

        //CONTEO DE DIAS DE LA SEMANA NO TRABAJADOS PARA DETERMINAR SI HUBIERON DIAS COMPENSATORIOS
        $d=1;
        while ($d<7) {
            if ($C_1_00[$d] == 0) {
                $tiempo_compensatorio = $tiempo_compensatorio + 1;
            }
            $d=$d+1;
        }

        //RECLASIFICACION DE HORAS DE DOMINGO
        if ($C_1_00[0] > 0) {
            $trabajo_domingo = 1;
            $C_1_25[0] = 0;
            $C_1_50[0] = 0;
            $C_1_88[0] = 0;
            $C_2_00[0] = 0;
            $C_2_25[0] = 0;
            $C_2_18[0] = 0;
            $C_2_63[0] = 0;
            $C_3_00[0] = 0;
            $C_3_12[0] = 0;
            $C_3_28[0] = 0;
            $C_3_75[0] = 0;
            $C_3_94[0] = 0;
            $C_5_47[0] = 0;
            $C_6_56[0] = 0;
            if ($tiempo_compensatorio >= 1) {
                $C_1_50[0] = $C_1_00[0]; $C_1_00[0] = 0;
                $tiempo_compensatorio = $tiempo_compensatorio - 1;
            } else {
                $dias_a_compensar_por_no_dar_compensatorio = $dias_a_compensar_por_no_dar_compensatorio + 1;
                $C_2_00[0] = $C_1_00[0]; $C_1_00[0] = 0;
            }
            if ($horas_extra[0] > 1) {
                $C_2_25[0] = 1;
                $C_3_94[0] = $horas_extra[0] - 1;
            } else {
                $C_2_25[0] = $horas_extra[0];
            }
        }

        //RECLASIFICACION DE HORAS EN DIAS NACIONALES
        $d=0;
        while ($d<7) {
            if ($dia_nacional[$d] == 1) {
                $C_2_50[$d] = $C_2_50[$d] + $C_1_00[$d]; $C_1_00[$d] = 0;
                $C_3_12[$d] = $C_3_12[$d] + $C_1_25[$d]; $C_1_25[$d] = 0;
                $C_3_75[$d] = $C_3_75[$d] + $C_1_50[$d]; $C_1_50[$d] = 0;
                $C_5_47[$d] = $C_5_47[$d] + $C_2_18[$d]; $C_2_18[$d] = 0;
                $C_6_56[$d] = $C_6_56[$d] + $C_2_63[$d]; $C_2_63[$d] = 0;
                if($tiempo_compensatorio >= 1) {$tiempo_compensatorio - 1;}
                else {
                    $dias_a_compensar_por_no_dar_compensatorio = $dias_a_compensar_por_no_dar_compensatorio + 1;
                    $C_3_00[$d] = $C_3_00[$d] + $C_2_50[$d]; $C_2_50[$d] = 0;
                }
            }
            $d=$d+1;
        }

        //RECLASIFICACION DE HORAS POR TIEMPOS COMPENSATORIOS NO OTORGADOS PARA DIAS NACIONALES (PRIMERO ENCONTRANDO DIAS QUE NO SEAN FERIADOS DONDE SE PUEDAN CLASIFICAR)
        while ($dias_a_compensar_por_no_dar_compensatorio > 0) {
            $d=1;
            while ($dia_nacional[$d] == 1 && $d<7) {
                $d=$d+1;
            }
            if ($d<7) {
                $C_1_88[$d] = $C_1_88[$d] + $C_1_25[$d]; $C_1_25[$d] = 0;
                $C_2_25[$d] = $C_2_25[$d] + $C_1_50[$d]; $C_1_50[$d] = 0;
                $C_3_28[$d] = $C_3_28[$d] + $C_2_18[$d]; $C_2_18[$d] = 0;
                $C_3_94[$d] = $C_3_94[$d] + $C_2_63[$d]; $C_2_63[$d] = 0;
            }
            $dias_a_compensar_por_no_dar_compensatorio = $dias_a_compensar_por_no_dar_compensatorio - 1;
            $dia_nacional[$d] = 1;
        }



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

        //IMPRESION DE LAS FILAS DE LA TABLA
        $d=0;
        while ($d<7) {
            echo("<tr>");
            echo("<td valign='top' bgcolor='#D3D2D0'>");
            echo($dia_de_la_semana[$d]);
            echo("</td>");
            echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
            echo($hora_de_entrada[$d]); echo(":00 A.M.");
            echo("</td>");
            echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
            echo($horas_regulares[$d]);
            echo("</td>");
            echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
            echo($hora_de_salida[$d]);
            echo("</td>");
            echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
            echo($horas_extra[$d]);
            echo("</td>");
            echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
            echo(($horas_regulares[$d]+$horas_extra[$d]));
            echo("</td>");
            echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
            echo($horas_antes_de_6[$d]);
            echo("</td>");
            echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
            echo($horas_despues_de_6[$d]);
            echo("</td>");
            echo("<td valign='top' align='center' bgcolor='#D3D2D0'>");
            echo($horas_acumuladas[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_1_00[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_1_25[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_1_50[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_1_88[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_2_00[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_2_18[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_2_25[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_2_50[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_2_63[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_3_00[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_3_12[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_3_28[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_3_75[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_3_94[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_5_47[$d]);
            echo("</td>");
            echo("<td valign='top' align='center'>");
            echo($C_6_56[$d]);
            echo("</td>");
            echo("</tr>");
            $d=$d+1;
        }

        echo("</table>");
    }
}
