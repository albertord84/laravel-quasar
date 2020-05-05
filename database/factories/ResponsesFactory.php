<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Responses;
use Faker\Generator as Faker;

$factory->define(Responses::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'question_id' => $faker->randomDigitNotNull,
        'campaign_id' => $faker->randomDigitNotNull,
        'response_option_id' => $faker->randomDigitNotNull,
        'discursive_text' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
