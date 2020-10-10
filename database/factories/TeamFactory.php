<?php

use Faker\Generator as Faker;

$factory->define(App\Models\auth\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
