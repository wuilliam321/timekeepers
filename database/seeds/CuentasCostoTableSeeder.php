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
        factory(App\CuentasCosto::class, 50)->create();
    }
}
