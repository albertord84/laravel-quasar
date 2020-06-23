<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Invitations;
use Faker\Generator as Faker;

$factory->define(Invitations::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'campaign_id' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
