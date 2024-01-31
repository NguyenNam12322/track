<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MetaSeo;
use Faker\Generator as Faker;

$factory->define(MetaSeo::class, function (Faker $faker) {

    return [
        'meta_title' => $faker->text,
        'meta_content' => $faker->text,
        'meta_og_title' => $faker->text,
        'meta_og_content' => $faker->text,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});
