<?php

use Illuminate\Database\Seeder;

class PlanillasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Planilla::class, 5)->create();
    }
}
