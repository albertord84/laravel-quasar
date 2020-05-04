<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ResponsesTypes;
use Faker\Generator as Faker;

$factory->define(ResponsesTypes::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'decription' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
