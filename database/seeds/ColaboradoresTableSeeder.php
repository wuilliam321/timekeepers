<?php

use Illuminate\Database\Seeder;

class ColaboradoresTableSeeder extends Seeder
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
                'id' => 5655,
                'nombre' => 'Jose Hernandez',
                'cedula' => '49133',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6287,
                'nombre' => 'Miguel Rodriguez',
                'cedula' => '80907',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7574,
                'nombre' => 'Manual Melendez',
                'cedula' => '81913',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8236,
                'nombre' => 'Jorge Rivera',
                'cedula' => '52085',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6161,
                'nombre' => 'Pedro Gomez',
                'cedula' => '68614',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6654,
                'nombre' => 'Jorge Mendoza',
                'cedula' => '49777',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8936,
                'nombre' => 'Juan Alberto Rodriguez',
                'cedula' => '29052',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5960,
                'nombre' => 'Jaime Velasquez',
                'cedula' => '55437',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8703,
                'nombre' => 'Luis Carlos Aguilar',
                'cedula' => '79187',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8749,
                'nombre' => 'Roberto Salgado',
                'cedula' => '61335',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7965,
                'nombre' => 'Diego Justiniani',
                'cedula' => '66561',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8413,
                'nombre' => 'Rebeca Martinez',
                'cedula' => '49044',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8121,
                'nombre' => 'Andrea Guardia',
                'cedula' => '82928',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8100,
                'nombre' => 'Ivan Fernandez',
                'cedula' => '88685',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7735,
                'nombre' => 'Pedro Lamarte',
                'cedula' => '49546',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6441,
                'nombre' => 'Enrique Gonzalez',
                'cedula' => '50255',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7775,
                'nombre' => 'Fernando Alvarado',
                'cedula' => '44001',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 8362,
                'nombre' => 'Roberto Cherigo',
                'cedula' => '54062',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7960,
                'nombre' => 'Marta Fernandez',
                'cedula' => '80680',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5946,
                'nombre' => 'Gabriel Gonzalez',
                'cedula' => '78296',
                'tipo_salario' => 'Por hora',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];
        foreach ($rows as $row) {
            \App\Colaboradore::insert($row);
        }
    }
}
