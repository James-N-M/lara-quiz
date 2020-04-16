<?php

use Faker\Generator as Faker;
use JamesNM\LaraQuiz\Models\LaraQuiz;
use JamesNM\LaraQuiz\Tests\User;

$factory->define(LaraQuiz::class, function (Faker $faker) {
    $creator = factory(User::class)->create();

    return [
        'name' => $faker->name,
        'description' => $faker->word,
        'creator_id' => $creator->id,
        'creator_type' => get_class($creator),
    ];
});