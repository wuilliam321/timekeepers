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
                'codigo' => '1.3.1.101',
                'nombre' => 'Preliminares',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'codigo' => '1.3.1.102',
                'nombre' => 'Movilización',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'codigo' => '1.3.1.103',
                'nombre' => 'Administrativo',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'codigo' => '1.3.1.104',
                'nombre' => 'Electricidad',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'codigo' => '1.3.1.105',
                'nombre' => 'Pavimentos',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6,
                'codigo' => '1.3.1.106',
                'nombre' => 'Estructuras',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7,
                'codigo' => '1.3.1.107',
                'nombre' => 'Losas de concreto',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8,
                'codigo' => '1.3.1.108',
                'nombre' => 'Escaleras',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 9,
                'codigo' => '1.3.2.201',
                'nombre' => 'Albanileria',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 10,
                'codigo' => '1.3.2.202',
                'nombre' => 'Plomeria',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        foreach ($rows as $row) {
            \App\CuentasCosto::insert($row);
        }
    }
}
