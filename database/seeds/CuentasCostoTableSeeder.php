<?php

use Illuminate\Database\Seeder;

class CuentasCostoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'id' => 1,
                'codigo' => '1.3.1.303.9.',
                'nombre' => "Demarcacion / Batambores (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'codigo' => '1.3.1.304.9.',
                'nombre' => "Limpieza (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'codigo' => '1.3.1.308.9.',
                'nombre' => "Oficina/deposito construcc (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'codigo' => '1.3.1.309.9.',
                'nombre' => "Cerca/Vallas/Aleros aceras (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'codigo' => '1.3.1.330.9.',
                'nombre' => "Campamento (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'codigo' => '1.3.1.331.9.',
                'nombre' => "Instalacion de Sanitarios (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'codigo' => '1.3.1.332.9.',
                'nombre' => "Comedores (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'codigo' => '1.3.1.334.9.',
                'nombre' => "Instalacion de Cocina (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'codigo' => '1.3.2.101.9.',
                'nombre' => "Desmonte (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'codigo' => '1.3.2.102.9.',
                'nombre' => "Desraigue (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'codigo' => '1.3.2.103.9.',
                'nombre' => "Drenajes temporales (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'codigo' => '1.3.2.335.9.',
                'nombre' => "Trampa de grasa (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 13,
                'codigo' => '1.3.2.401.9.',
                'nombre' => "Viga-ducto electrica (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 14,
                'codigo' => '1.3.2.402.9.',
                'nombre' => "Camara de transformador (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 15,
                'codigo' => '1.3.2.403.9.',
                'nombre' => "Camara electrica de paso (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 16,
                'codigo' => '1.3.2.410.9.',
                'nombre' => "Viga-ducto de telefonos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 17,
                'codigo' => '1.3.2.411.9.',
                'nombre' => "Camara de telefonos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 18,
                'codigo' => '1.3.2.420.9.',
                'nombre' => "Sub Estacion Electrica (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 19,
                'codigo' => '1.3.2.599.9.',
                'nombre' => "MDO de Calles de Acceso (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 20,
                'codigo' => '1.3.2.699.9.',
                'nombre' => "MDO de Pavimentos  (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 21,
                'codigo' => '1.3.2.799.9.',
                'nombre' => "MDO de Cerca de Ciclon  (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 22,
                'codigo' => '1.3.2.899.9.',
                'nombre' => "MDO de Muro de Reten (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 23,
                'codigo' => '1.3.2.901.9.',
                'nombre' => "Garita (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 24,
                'codigo' => '1.3.2.902.9.',
                'nombre' => "Tinaquera (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 25,
                'codigo' => '1.3.2.903.9.',
                'nombre' => "Maceteros completos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 26,
                'codigo' => '1.3.2.904.9.',
                'nombre' => "Jardineria (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 27,
                'codigo' => '1.3.2.905.9.',
                'nombre' => "Aceras (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 28,
                'codigo' => '1.3.2.906.9.',
                'nombre' => "Cordon comun (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 29,
                'codigo' => '1.3.2.907.9.',
                'nombre' => "Cordon cuneta (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 30,
                'codigo' => '1.3.2.908.9.',
                'nombre' => "Tope de Estacionamiento (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 31,
                'codigo' => '1.3.2.909.9.',
                'nombre' => "Media Cana (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 32,
                'codigo' => '1.3.2.910.9.',
                'nombre' => "Bolardos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 33,
                'codigo' => '1.3.2.912.9.',
                'nombre' => "Parachoques (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 34,
                'codigo' => '1.3.2.915.9.',
                'nombre' => "Puente de Acceso (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 35,
                'codigo' => '1.3.2.916.9.',
                'nombre' => "Bumpers de Anden (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 36,
                'codigo' => '1.3.3.30.9.',
                'nombre' => "Losa Hidrostatica (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 37,
                'codigo' => '1.3.3.40.9.',
                'nombre' => "Foso de Ascensor (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 38,
                'codigo' => '1.3.3.50.9.',
                'nombre' => "Tanque de agua soterrado (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 39,
                'codigo' => '1.3.3.60.9.',
                'nombre' => "Piscina (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 40,
                'codigo' => '1.3.3.61.9.',
                'nombre' => "Espejo de Agua (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 41,
                'codigo' => '1.3.3.70.9.',
                'nombre' => "Tanque de Agua Elevado (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 42,
                'codigo' => '1.3.3.80.9.',
                'nombre' => "Fosos de Achique (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 43,
                'codigo' => '1.3.3.160.9.',
                'nombre' => "Matt Foundation (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 44,
                'codigo' => '1.3.3.199.9.',
                'nombre' => "Mdo de Cabezales y Zapatas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 45,
                'codigo' => '1.3.3.260.9.',
                'nombre' => "Vigas de tranferencia (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 46,
                'codigo' => '1.3.3.299.9.',
                'nombre' => "Mdo de Vigas Sismicas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 47,
                'codigo' => '1.3.3.399.9.',
                'nombre' => "Mdo de Fundaciones Corridas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 48,
                'codigo' => '1.3.3.499.9.',
                'nombre' => "MDO de Piso sobre tierra (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 49,
                'codigo' => '1.3.3.599.9.',
                'nombre' => "MDO de Columnas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 50,
                'codigo' => '1.3.3.699.9.',
                'nombre' => "MDO de Shear walls (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 51,
                'codigo' => '1.3.3.701.9.',
                'nombre' => "Outriggers (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 52,
                'codigo' => '1.3.3.799.9.',
                'nombre' => "MDO de Vigas  de concreto (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 53,
                'codigo' => '1.3.3.864.9.',
                'nombre' => "Pedestales de Torres de Enfriamiento (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 54,
                'codigo' => '1.3.3.899.9.',
                'nombre' => "MDO de Losa Postensada (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 55,
                'codigo' => '1.3.3.990.9.',
                'nombre' => "MDO de Estructura (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 56,
                'codigo' => '1.3.3.999.9.',
                'nombre' => "MDO de Escaleras (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 57,
                'codigo' => '1.3.4.109.9.',
                'nombre' => "Replanteo (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 58,
                'codigo' => '1.3.4.126.9.',
                'nombre' => "Demolicion de paredes (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 59,
                'codigo' => '1.3.4.143.9.',
                'nombre' => "Albanileria para subcntrts (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 60,
                'codigo' => '1.3.4.152.9.',
                'nombre' => "Paredes de Covintec (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 61,
                'codigo' => '1.3.4.153.9.',
                'nombre' => "Paredes de Plycem (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 62,
                'codigo' => '1.3.4.154.9.',
                'nombre' => "Descolgados (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 63,
                'codigo' => '1.3.4.197.9.',
                'nombre' => "Albanileria repar.dSbcntrt (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 64,
                'codigo' => '1.3.4.190.9.',
                'nombre' => "Mano de Obra de Paredes (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 65,
                'codigo' => '1.3.4.290.9.',
                'nombre' => "Mano de Obra de Repello (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 66,
                'codigo' => '1.3.4.402.9.',
                'nombre' => "Pedestales (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 67,
                'codigo' => '1.3.4.403.9.',
                'nombre' => "Capiteles (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 68,
                'codigo' => '1.3.4.404.9.',
                'nombre' => "Baranda, balaustr, pirndls (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 69,
                'codigo' => '1.3.5.101.9.',
                'nombre' => "Platos y planchas de acero (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 70,
                'codigo' => '1.3.5.102.9.',
                'nombre' => "Pernos de fijacion (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 71,
                'codigo' => '1.3.5.103.9.',
                'nombre' => "Columnas WF (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 72,
                'codigo' => '1.3.5.104.9.',
                'nombre' => "Columnas de tubo (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 73,
                'codigo' => '1.3.5.105.9.',
                'nombre' => "Cerchas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 74,
                'codigo' => '1.3.5.106.9.',
                'nombre' => "Marcos rigidos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 75,
                'codigo' => '1.3.5.107.9.',
                'nombre' => "Vigas WF (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 76,
                'codigo' => '1.3.5.108.9.',
                'nombre' => "Refuerzos y miscelaneos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 77,
                'codigo' => '1.3.5.109.9.',
                'nombre' => "Tensores (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 78,
                'codigo' => '1.3.5.201.9.',
                'nombre' => "Sostenedores (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 79,
                'codigo' => '1.3.5.202.9.',
                'nombre' => "Alineadores barra + tuerca (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 80,
                'codigo' => '1.3.5.203.9.',
                'nombre' => "Alineadores de platina (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 81,
                'codigo' => '1.3.5.204.9.',
                'nombre' => "Carriols glv. 3\"x2\" cl. 16 (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 82,
                'codigo' => '1.3.5.205.9.',
                'nombre' => "Carriols glv. 4\"x2\" cl. 16 (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 83,
                'codigo' => '1.3.5.206.9.',
                'nombre' => "Carriols glv. 6\"x2\" cl. 16 (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 84,
                'codigo' => '1.3.5.207.9.',
                'nombre' => "Carriols glv. 8\"x2\" cl. 16 (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 85,
                'codigo' => '1.3.5.208.9.',
                'nombre' => "Carrls glv 10\"x2.5\" cal 16 (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 86,
                'codigo' => '1.3.5.399.9.',
                'nombre' => "Mano de obra Metaldeck (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 87,
                'codigo' => '1.3.5.801.9.',
                'nombre' => "Cubierta de junta de piso (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 88,
                'codigo' => '1.3.5.802.9.',
                'nombre' => "Cubierta de junta de pared (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 89,
                'codigo' => '1.3.5.803.9.',
                'nombre' => "Cubierta junta cielo ras (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 90,
                'codigo' => '1.3.5.804.9.',
                'nombre' => "Cubierta de junta de techo (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 91,
                'codigo' => '1.3.7.201.9.',
                'nombre' => "Fiberglass 1-1/2\"+alambre (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 92,
                'codigo' => '1.3.7.202.9.',
                'nombre' => "Fiberglass 2\"+ alambre (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 93,
                'codigo' => '1.3.7.203.9.',
                'nombre' => "Fiberglass 3\"+ alambre (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 94,
                'codigo' => '1.3.7.204.9.',
                'nombre' => "Aislante tipo Low-e (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 95,
                'codigo' => '1.3.7.310.9.',
                'nombre' => "Shigles (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 96,
                'codigo' => '1.3.7.320.9.',
                'nombre' => "Tejas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 97,
                'codigo' => '1.3.7.401.9.',
                'nombre' => "Laminas cal. 26 galvanizad (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 98,
                'codigo' => '1.3.7.402.9.',
                'nombre' => "Laminas cal. 26 esmaltado (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 99,
                'codigo' => '1.3.7.403.9.',
                'nombre' => "Laminas cal. 24 esmaltado (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 100,
                'codigo' => '1.3.7.404.9.',
                'nombre' => "Laminas cal. 26 aluzinc (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 101,
                'codigo' => '1.3.7.405.9.',
                'nombre' => "Tornillos de techo (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 102,
                'codigo' => '1.3.7.406.9.',
                'nombre' => "Cumbreras (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 103,
                'codigo' => '1.3.7.415.9.',
                'nombre' => "Paneles prefabricados pard (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 104,
                'codigo' => '1.3.7.460.9.',
                'nombre' => "Laminas esmaltadas pared (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 105,
                'codigo' => '1.3.7.601.9.',
                'nombre' => "Solapas cal. 20 (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 106,
                'codigo' => '1.3.7.602.9.',
                'nombre' => "Canales pluvials cl. 16<4' (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 107,
                'codigo' => '1.3.7.603.9.',
                'nombre' => "Canales pluvials cl. 16>4' (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 108,
                'codigo' => '1.3.7.604.9.',
                'nombre' => "Canales especiales (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 109,
                'codigo' => '1.3.7.605.9.',
                'nombre' => "Cuellos para bajantes (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 110,
                'codigo' => '1.3.7.606.9.',
                'nombre' => "Bajantes pluviales PVC 4\"0 (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 111,
                'codigo' => '1.3.7.607.9.',
                'nombre' => "Bajantes pluviales PVC 6\"0 (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 112,
                'codigo' => '1.3.7.608.9.',
                'nombre' => "Codos y miscelaneos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 113,
                'codigo' => '1.3.9.785.9.',
                'nombre' => "Moldura de Aluminio (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 114,
                'codigo' => '1.3.9.901.9.',
                'nombre' => "Preparacion de superficie (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 115,
                'codigo' => '1.3.9.902.9.',
                'nombre' => "Pintura paredes interiores (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 116,
                'codigo' => '1.3.9.903.9.',
                'nombre' => "Pintura paredes exteriores (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 117,
                'codigo' => '1.3.9.904.9.',
                'nombre' => "Pintura elementos metalics (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 118,
                'codigo' => '1.3.9.905.9.',
                'nombre' => "Pintura de pisos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 119,
                'codigo' => '1.3.9.906.9.',
                'nombre' => "Pintura de puertas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 120,
                'codigo' => '1.3.9.907.9.',
                'nombre' => "Pintura de pavimentos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 121,
                'codigo' => '1.3.10.201.9.',
                'nombre' => "Persianas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 122,
                'codigo' => '1.3.10.202.9.',
                'nombre' => "Parrillas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 123,
                'codigo' => '1.3.10.203.9.',
                'nombre' => "Mallas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 124,
                'codigo' => '1.3.10.204.9.',
                'nombre' => "Ventilaciones (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 125,
                'codigo' => '1.3.10.210.9.',
                'nombre' => "Escotilla (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 126,
                'codigo' => '1.3.10.701.9.',
                'nombre' => "Accesorios de bano (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 127,
                'codigo' => '1.3.10.702.9.',
                'nombre' => "Gabinete medico (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 128,
                'codigo' => '1.3.10.703.9.',
                'nombre' => "Accesorios de cocina (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 129,
                'codigo' => '1.3.10.704.9.',
                'nombre' => "Accesorios de lavanderia (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 130,
                'codigo' => '1.3.10.705.9.',
                'nombre' => "Accesorios de closets (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 131,
                'codigo' => '1.3.13.801.9.',
                'nombre' => "Estructura de Piscina (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 132,
                'codigo' => '1.3.17.401.9.',
                'nombre' => "Grua Torre (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 133,
                'codigo' => '1.3.17.403.9.',
                'nombre' => "Montacargas (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 134,
                'codigo' => '1.3.17.901.9.',
                'nombre' => "Mant. equipo y formaleta (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 135,
                'codigo' => '1.3.19.501.9.',
                'nombre' => "Manejo de materiales (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 136,
                'codigo' => '1.3.19.502.9.',
                'nombre' => "Limpieza continua + chuta (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 137,
                'codigo' => '1.3.19.503.9.',
                'nombre' => "Terminacion / Acabado finl (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 138,
                'codigo' => '1.3.19.504.9.',
                'nombre' => "Mantenimiento post-entrega (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 139,
                'codigo' => '1.3.19.506.9.',
                'nombre' => "Proteccion de Acabados (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 140,
                'codigo' => '1.3.19.507.9.',
                'nombre' => "Manteni.Aceras y Calles (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 141,
                'codigo' => '1.3.19.524.9.',
                'nombre' => "Rampa de lavado de camiones (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 142,
                'codigo' => '1.3.19.530.9.',
                'nombre' => "Custodio de Llaves (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 143,
                'codigo' => '1.3.19.591.9.',
                'nombre' => "Limpieza de oficina (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 144,
                'codigo' => '1.3.19.592.9.',
                'nombre' => "Limpieza Final (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 145,
                'codigo' => '1.3.20.101.9.',
                'nombre' => "Ingeniero residente (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 146,
                'codigo' => '1.3.20.102.9.',
                'nombre' => "Capataces / Jefes cuadrill (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 147,
                'codigo' => '1.3.20.103.9.',
                'nombre' => "Timekeeper (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 148,
                'codigo' => '1.3.20.104.9.',
                'nombre' => "Almacenista (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 149,
                'codigo' => '1.3.20.106.9.',
                'nombre' => "Gerente de Proyecto (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 150,
                'codigo' => '1.3.20.107.9.',
                'nombre' => "Ingeniero Asistente (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 151,
                'codigo' => '1.3.20.108.9.',
                'nombre' => "Asistente Administrativo (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 152,
                'codigo' => '1.3.20.109.9.',
                'nombre' => "Ingeniero Control Calidad (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 153,
                'codigo' => '1.3.20.110.9.',
                'nombre' => "Administracion Proyectos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 154,
                'codigo' => '1.3.20.111.9.',
                'nombre' => "Ingeniero Seguridad (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 155,
                'codigo' => '1.3.20.112.9.',
                'nombre' => "Ing. electromecanico/plomr (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 156,
                'codigo' => '1.3.20.113.9.',
                'nombre' => "Arquitecto de Acabados (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 157,
                'codigo' => '1.3.20.114.9.',
                'nombre' => "Sub capataz (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 158,
                'codigo' => '1.3.20.120.9.',
                'nombre' => "Capacitacion de Personal (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 159,
                'codigo' => '1.3.20.125.9.',
                'nombre' => "Control de Costos (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 160,
                'codigo' => '1.3.20.130.9.',
                'nombre' => "Asesor de Instalacion Plato (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 161,
                'codigo' => '1.3.20.135.9.',
                'nombre' => "Submitals (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 162,
                'codigo' => '1.3.20.137.9.',
                'nombre' => "Ing de Estructura Metalica (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 163,
                'codigo' => '1.3.20.138.9.',
                'nombre' => "Ing. Control de Programacion (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 164,
                'codigo' => '1.3.20.139.9.',
                'nombre' => "Ing. Logistica y Abastecimiento (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 165,
                'codigo' => '1.3.20.140.9.',
                'nombre' => "Ing Control Leed (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 166,
                'codigo' => '1.3.20.141.9.',
                'nombre' => "Arq. Planos As Built (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 167,
                'codigo' => '1.3.20.201.9.',
                'nombre' => "Pick-up asignado a proyect (MDO)",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        foreach ($rows as $row) {
            \App\CuentasCosto::insert($row);
        }
    }
}

