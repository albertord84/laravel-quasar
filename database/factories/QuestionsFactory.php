<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Questions;
use Faker\Generator as Faker;

$factory->define(Questions::class, function (Faker $faker) {

    return [
        'type_id' => $faker->randomDigitNotNull,
        'response_type_id' => $faker->randomDigitNotNull,
        'question' => $faker->word,
        'json_data' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
