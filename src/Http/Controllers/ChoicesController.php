<?php

namespace JamesNM\LaraQuiz\Http\Controllers;
use JamesNM\LaraQuiz\Models\Question;

class ChoicesController extends Controller
{
    public function store(Question $question)
    {
        return $question->choices()->create(request()->all());
    }
}