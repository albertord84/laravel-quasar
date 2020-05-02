<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recompenses;
use Faker\Generator as Faker;

$factory->define(Recompenses::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'questionnaire_id' => $faker->randomDigitNotNull,
        'campaign_id' => $faker->randomDigitNotNull,
        'value' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
