<?php

use Illuminate\Database\Seeder;

class RecargosTableSeeder extends Seeder
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
                'codigo' => 'C_1_00',
                'nombre' => 'Horas a 1.00',
                'recargo' => 1.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_1_25',
                'nombre' => 'Horas a 1.25',
                'recargo' => 1.25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_1_50',
                'nombre' => 'Horas a 1.50',
                'recargo' => 1.50,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_1_88',
                'nombre' => 'Horas a 1.88',
                'recargo' => 1.88,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_2_00',
                'nombre' => 'Horas a 2.00',
                'recargo' => 2.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_2_18',
                'nombre' => 'Horas a 2.18',
                'recargo' => 2.18,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_2_25',
                'nombre' => 'Horas a 2.25',
                'recargo' => 2.25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_2_50',
                'nombre' => 'Horas a 2.50',
                'recargo' => 2.50,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_2_63',
                'nombre' => 'Horas a 2.63',
                'recargo' => 2.63,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_3_00',
                'nombre' => 'Horas a 3.00',
                'recargo' => 3.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_3_12',
                'nombre' => 'Horas a 3.12',
                'recargo' => 3.12,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_3_28',
                'nombre' => 'Horas a 3.28',
                'recargo' => 3.28,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_3_75',
                'nombre' => 'Horas a 3.75',
                'recargo' => 3.75,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_3_94',
                'nombre' => 'Horas a 3.94',
                'recargo' => 3.94,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_5_47',
                'nombre' => 'Horas a 5.47',
                'recargo' => 5.47,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
            [
                'codigo' => 'C_6_56',
                'nombre' => 'Horas a 6.56',
                'recargo' => 6.56,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')],
        ];
        foreach ($rows as $row) {
            \App\Recargo::insert($row);
        }
    }
}
