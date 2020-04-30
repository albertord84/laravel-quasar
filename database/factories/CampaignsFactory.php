<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campaigns;
use Faker\Generator as Faker;

$factory->define(Campaigns::class, function (Faker $faker) {

    return [
        'status_id' => $faker->randomDigitNotNull,
        'criator_id' => $faker->randomDigitNotNull,
        'updater_id' => $faker->randomDigitNotNull,
        'questionary_id' => $faker->randomDigitNotNull,
        'base_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'objetive' => $faker->word,
        'description' => $faker->word,
        'observation' => $faker->word,
        'response_limit' => $faker->randomDigitNotNull,
        'response_amount' => $faker->randomDigitNotNull,
        'invitations_sent' => $faker->randomDigitNotNull,
        'invitations_accepted' => $faker->randomDigitNotNull,
        'invitations_declined' => $faker->randomDigitNotNull,
        'requested_date' => $faker->date('Y-m-d H:i:s'),
        'analyzed_date' => $faker->date('Y-m-d H:i:s'),
        'start_date' => $faker->date('Y-m-d H:i:s'),
        'end_date' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
