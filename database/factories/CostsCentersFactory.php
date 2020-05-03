<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CostsCenters;
use Faker\Generator as Faker;

$factory->define(CostsCenters::class, function (Faker $faker) {

    return [
        'company_id' => $faker->randomDigitNotNull,
        'admin_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
