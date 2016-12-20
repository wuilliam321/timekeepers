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

$factory->define(App\HorasEntrada::class, function (Faker\Generator $faker) {
    $date = $faker->dateTimeThisMonth();
    return [
        'colaborador_id' => $faker->randomElement([
            5655, 6287/*, 7574, 8236, 6161, 6654, 8936, 5960, 8703, 8749,
            7965, 8413, 8121, 8100, 7735, 6441, 7775, 8362, 7960, 5946*/
        ]),
        'fecha_entrada' => $date,
        'hora_entrada' => $faker->numberBetween(7, 9) . ':' . $faker->numberBetween(0,59),
    ];
});

$factory->define(App\HorasLaborada::class, function (Faker\Generator $faker) {
    return [
        'colaborador_id' => $faker->randomElement([
            5655/*, 6287, 7574, 8236, 6161, 6654, 8936, 5960, 8703, 8749,
            7965, 8413, 8121, 8100, 7735, 6441, 7775, 8362, 7960, 5946*/
        ]),
        'planilla_id' => 1/*$faker->numberBetween(1, 20)*/,
        'cuenta_costo_id' => $faker->numberBetween(1, 10),
        'beneficio_id' => $faker->numberBetween(1, 5),
        'cuenta_beneficio_id' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(App\HorasLaboradasDetalle::class, function (Faker\Generator $faker) {
    return [
        'horas_laborada_id' => $faker->numberBetween(1, 3),
        'fecha_laborada' => $faker->unique()->dateTimeThisMonth(),
        'horas_laboradas' => $faker->numberBetween(4, 12),
    ];
});

$factory->define(App\Feriado::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->dateTimeThisMonth(),
    ];
});
