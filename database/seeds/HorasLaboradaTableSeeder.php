<?php

use Illuminate\Database\Seeder;

class HorasLaboradaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\HorasLaborada::class, 30)->create();
    }
}
