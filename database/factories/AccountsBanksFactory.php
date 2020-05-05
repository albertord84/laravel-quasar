<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AccountsBanks;
use Faker\Generator as Faker;

$factory->define(AccountsBanks::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'bank' => $faker->word,
        'agency' => $faker->word,
        'account' => $faker->word,
        'account_type' => $faker->word,
        'dig' => $faker->word,
        'titular_name' => $faker->word,
        'titular_cpf' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
