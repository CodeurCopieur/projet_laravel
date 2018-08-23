<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'post_type' => $faker->randomElement(['stage' ,'formation', 'undefined']),
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'date_debut' => $faker->date(),
        'date_fin' => $faker->date(),
        'prix' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9000.00),
        'max_eleves' => $faker->numberBetween($min = 10, $max = 20),
    ];
});
