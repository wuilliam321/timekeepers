<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProyectosTableSeeder::class);
        $this->call(ColaboradoresTableSeeder::class);
        $this->call(PlanillasTableSeeder::class);
        $this->call(HorasEntradaTableSeeder::class);
        $this->call(CuentasCostoTableSeeder::class);
        $this->call(CuentasBeneficioTableSeeder::class);
        $this->call(BeneficioTableSeeder::class);
//        $this->call(HorasLaboradaTableSeeder::class);
//        $this->call(HorasLaboradasDetalleTableSeeder::class);
    }
}
