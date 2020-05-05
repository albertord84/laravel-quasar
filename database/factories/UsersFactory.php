<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Users;
use Faker\Generator as Faker;

$factory->define(Users::class, function (Faker $faker) {

    return [
        'company_id' => $faker->randomDigitNotNull,
        'cost_center_id' => $faker->randomDigitNotNull,
        'address_id' => $faker->randomDigitNotNull,
        'role_id' => $faker->randomDigitNotNull,
        'status_id' => $faker->randomDigitNotNull,
        'username' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
