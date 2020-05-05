<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BasesOrigins;
use Faker\Generator as Faker;

$factory->define(BasesOrigins::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'decription' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
