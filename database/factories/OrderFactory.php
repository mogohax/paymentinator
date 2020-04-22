<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OM\Order;
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

$factory->define(\App\Models\OM\Order::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(array_keys(Order::getAvailableStatuses())),
//        'product_id'
    ];
});
