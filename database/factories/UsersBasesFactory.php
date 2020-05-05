<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UsersBases;
use Faker\Generator as Faker;

$factory->define(UsersBases::class, function (Faker $faker) {

    return [
        'base_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
