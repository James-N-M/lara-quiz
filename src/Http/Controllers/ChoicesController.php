<?php

namespace JamesNM\LaraQuiz\Http\Controllers;
use JamesNM\LaraQuiz\Models\Question;
use JamesNM\LaraQuiz\Models\Choice;

class ChoicesController extends Controller
{
    public function index(Question $question)
    {
        return $question->choices;
    }

    public function store(Question $question)
    {
        return $question->choices()->create(request()->all());
    }

    public function update(Choice $choice)
    {
        return $choice->update(request()->all());
    }

    public function destroy(Choice $choice)
    {
        return $choice->delete();
    }
}