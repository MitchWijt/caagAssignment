<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->unique()->numberBetween(1, 20),
    ];
});
