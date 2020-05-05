<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bases;
use Faker\Generator as Faker;

$factory->define(Bases::class, function (Faker $faker) {

    return [
        'origin_id' => $faker->randomDigitNotNull,
        'company_id' => $faker->randomDigitNotNull,
        'criator_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'decription' => $faker->word,
        'json_data' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
