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

$factory->define(App\Proyecto::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
    ];
});

$factory->define(App\Colaboradore::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'cedula' => $faker->bothify('##########'),
        'tipo_salario' => $faker->randomElement(['Hora', 'Proyecto']),
    ];
});

$factory->define(App\Planilla::class, function (Faker\Generator $faker) {
    return [
        'colaborador_id' => $faker->numberBetween(1,10),
        'proyecto_id' => $faker->numberBetween(1,10),
        'codigo' => $faker->bothify('??######'),
    ];
});

$factory->define(App\HorasEntrada::class, function (Faker\Generator $faker) {
    return [
        'colaborador_id' => $faker->numberBetween(1,10),
        'fecha_entrada' => $faker->dateTimeBetween('-10 days', 'now'),
    ];
});

$factory->define(App\CuentasCosto::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->bothify('#.#.#.### costo ') . $faker->words(1, true) . $faker->bothify(' (???)'),
    ];
});

$factory->define(App\CuentasBeneficio::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->bothify('#.#.#.### beneficio ') . $faker->words(1, true) . $faker->bothify(' (???)'),
    ];
});
