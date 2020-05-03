<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Companies;
use Faker\Generator as Faker;

$factory->define(Companies::class, function (Faker $faker) {

    return [
        'responsible_id' => $faker->randomDigitNotNull,
        'address_id' => $faker->randomDigitNotNull,
        'social_reason' => $faker->word,
        'fantasy_name' => $faker->word,
        'cnpj' => $faker->word,
        'phone' => $faker->word,
        'phone2' => $faker->word,
        'decription' => $faker->word,
        'observation' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
