<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\OM\Subscription::class, function (Faker $faker) {
    return [
//        'product_id',
        'status' => $faker->randomElement(\App\Models\OM\Subscription::getAvailableStatuses()),
        'valid_until' => $faker->dateTimeThisYear,
    ];
});
