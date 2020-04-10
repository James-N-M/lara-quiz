<?php

use JamesNM\LaraQuiz\Models\LaraQuiz;
use Faker\Generator as Faker;

$factory->define(LaraQuiz::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
    ];
});