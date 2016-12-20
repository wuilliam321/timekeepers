<?php

use Illuminate\Database\Seeder;

class FeriadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Feriado::class, 10)->create();
    }
}
