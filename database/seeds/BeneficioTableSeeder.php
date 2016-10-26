<?php

use Illuminate\Database\Seeder;

class BeneficioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Beneficio::class, 40)->create();
    }
}
