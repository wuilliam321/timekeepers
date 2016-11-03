<?php

use Illuminate\Database\Seeder;

class PlanillasTableSeeder extends Seeder
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
                'colaborador_id' => 5655,
                'proyecto_id' => 1,
                'codigo' => 'PL564564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'colaborador_id' => 6287,
                'proyecto_id' => 1,
                'codigo' => 'PL564564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'colaborador_id' => 7574,
                'proyecto_id' => 1,
                'codigo' => 'PL564564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'colaborador_id' => 8236,
                'proyecto_id' => 1,
                'codigo' => 'PL564564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'colaborador_id' => 6161,
                'proyecto_id' => 1,
                'codigo' => 'PL564564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6,
                'colaborador_id' => 6654,
                'proyecto_id' => 2,
                'codigo' => 'PL894985',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7,
                'colaborador_id' => 8936,
                'proyecto_id' => 2,
                'codigo' => 'PL894985',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8,
                'colaborador_id' => 5960,
                'proyecto_id' => 2,
                'codigo' => 'PL894985',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 9,
                'colaborador_id' => 8703,
                'proyecto_id' => 2,
                'codigo' => 'PL894985',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 10,
                'colaborador_id' => 8749,
                'proyecto_id' => 2,
                'codigo' => 'PL894985',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 11,
                'colaborador_id' => 7965,
                'proyecto_id' => 2,
                'codigo' => 'PL894985',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 12,
                'colaborador_id' => 8413,
                'proyecto_id' => 2,
                'codigo' => 'PL894985',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 13,
                'colaborador_id' => 8121,
                'proyecto_id' => 2,
                'codigo' => 'PL894985',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 14,
                'colaborador_id' => 8100,
                'proyecto_id' => 5,
                'codigo' => 'PL321564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 15,
                'colaborador_id' => 7735,
                'proyecto_id' => 5,
                'codigo' => 'PL321564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 16,
                'colaborador_id' => 6441,
                'proyecto_id' => 5,
                'codigo' => 'PL321564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 17,
                'colaborador_id' => 7775,
                'proyecto_id' => 5,
                'codigo' => 'PL321564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 18,
                'colaborador_id' => 8362,
                'proyecto_id' => 5,
                'codigo' => 'PL321564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 19,
                'colaborador_id' => 7960,
                'proyecto_id' => 5,
                'codigo' => 'PL321564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 20,
                'colaborador_id' => 5946,
                'proyecto_id' => 5,
                'codigo' => 'PL321564',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        foreach ($rows as $row) {
            \App\Planilla::insert($row);
        }
    }
}
