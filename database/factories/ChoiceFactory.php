<?php

use JamesNM\LaraQuiz\Models\Question;
use JamesNM\LaraQuiz\Models\Choice;
use Faker\Generator as Faker;

$factory->define(Choice::class, function (Faker $faker) {
    return [
        'choice' => $faker->randomLetter,
        'question_id' => factory(Question::class)->create()->id,
        'is_correct_choice' => $faker->boolean,
    ];
});