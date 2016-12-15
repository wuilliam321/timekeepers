<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\CuentasBeneficio::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->bothify('#.#.#.### beneficio ') . $faker->words(1, true) . $faker->bothify(' (???)'),
    ];
});

//$factory->define(App\HorasEntrada::class, function (Faker\Generator $faker) {
//    $date = $faker->dateTimeBetween('-10 days', 'now');
//    return [
//        'colaborador_id' => $faker->numberBetween(1,10),
//        'fecha_entrada' => $date,
//        'hora_entrada' => $faker->numberBetween(0, 23) . ':' . $faker->numberBetween(0,60),
//    ];
//});
//
//$factory->define(App\HorasLaborada::class, function (Faker\Generator $faker) {
//    return [
//        'colaborador_id' => $faker->numberBetween(1, 10),
//        'planilla_id' => $faker->numberBetween(1, 30),
//        'cuenta_costo_id' => $faker->numberBetween(1, 50),
//        'beneficio_id' => $faker->numberBetween(1, 40),
//        'cuenta_beneficio_id' => $faker->numberBetween(1, 50),
//    ];
//});
//
//$factory->define(App\HorasLaboradasDetalle::class, function (Faker\Generator $faker) {
//    return [
//        'horas_laborada_id' => $faker->numberBetween(1, 30),
//        'fecha_laborada' => $faker->dateTimeBetween('-10 days', 'now'),
//        'horas_laboradas' => $faker->numberBetween(1, 8),
//    ];
//});
