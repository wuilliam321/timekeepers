<?php

use Illuminate\Database\Seeder;

class HorasLaboradasDetalleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\HorasLaboradasDetalle::class, 180)->create();
    }
}
