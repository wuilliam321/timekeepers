<?php

use Illuminate\Database\Seeder;

class CuentasBeneficioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CuentasBeneficio::class, 50)->create();
    }
}
