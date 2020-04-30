<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OptionsResponses;
use Faker\Generator as Faker;

$factory->define(OptionsResponses::class, function (Faker $faker) {

    return [
        'question_id' => $faker->randomDigitNotNull,
        'response' => $faker->word,
        'truth' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
