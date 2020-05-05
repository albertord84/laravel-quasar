<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Questionnaires;
use Faker\Generator as Faker;

$factory->define(Questionnaires::class, function (Faker $faker) {

    return [
        'plane_id' => $faker->randomDigitNotNull,
        'criator_id' => $faker->randomDigitNotNull,
        'updater_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'description' => $faker->word,
        'observation' => $faker->word,
        'released' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
