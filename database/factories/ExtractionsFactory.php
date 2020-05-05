<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Extractions;
use Faker\Generator as Faker;

$factory->define(Extractions::class, function (Faker $faker) {

    return [
        'status_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'requested_value' => $faker->randomDigitNotNull,
        'payed_value' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
