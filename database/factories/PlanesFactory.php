<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Planes;
use Faker\Generator as Faker;

$factory->define(Planes::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'price' => $faker->randomDigitNotNull,
        'recompense' => $faker->randomDigitNotNull,
        'description' => $faker->word,
        'has_boolean_selection' => $faker->randomDigitNotNull,
        'has_unique_selection' => $faker->randomDigitNotNull,
        'has_multiple_selection' => $faker->randomDigitNotNull,
        'has_scale_response' => $faker->randomDigitNotNull,
        'has_discursive_response' => $faker->randomDigitNotNull,
        'has_image_content' => $faker->randomDigitNotNull,
        'has_video_content' => $faker->randomDigitNotNull,
        'has_link_content' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
