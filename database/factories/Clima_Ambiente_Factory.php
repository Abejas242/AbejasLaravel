<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Clima_Ambiente;
use Faker\Generator as Faker;

$factory->define(Clima_Ambiente::class, function (Faker $faker) {
    return [
        'temperatura' => $faker->numberBetween($min = 10, $max = 40),
        'humedad' => $faker->numberBetween($min = 10, $max = 100),
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'hora' => $faker->time($format = 'H:i:s', $max = 'now'),
		'apiario_id' => $faker->numberBetween($min = 1, $max = 3)
    ];
});
