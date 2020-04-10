<?php


namespace JamesNM\LaraQuiz\Http\Controllers;
use JamesNM\LaraQuiz\Models\LaraQuiz;

class QuestionsController extends Controller
{
    public function store(LaraQuiz $quiz)
    {
        return $quiz->questions()->create(request('question'));
    }
}