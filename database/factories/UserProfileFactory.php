<?php

use Faker\Generator as Faker;

$factory->define(App\Models\auth\UserProfile::class, function (Faker $faker) {
    return [
        'bio' => $faker->paragraph,
    ];
});
