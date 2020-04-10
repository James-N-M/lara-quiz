<?php

use JamesNM\LaraQuiz\Models\LaraQuiz;
use JamesNM\LaraQuiz\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => $faker->word,
        'quiz_id' => factory(LaraQuiz::class)->create()->id,
    ];
});