<?php


namespace JamesNM\LaraQuiz\Http\Controllers;
use JamesNM\LaraQuiz\Models\LaraQuiz;

class QuestionsController extends Controller
{
    public function index(LaraQuiz $quiz)
    {
        return $quiz->questions;
    }

    public function store(LaraQuiz $quiz)
    {
        return $quiz->questions()->create(request('question'));
    }
}