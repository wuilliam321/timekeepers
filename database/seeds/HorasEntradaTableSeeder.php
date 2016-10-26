<?php

use Illuminate\Database\Seeder;

class HorasEntradaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\HorasEntrada::class, 100)->create();
    }
}
