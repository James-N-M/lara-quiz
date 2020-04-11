<?php


namespace JamesNM\LaraQuiz\Http\Controllers;
use JamesNM\LaraQuiz\Models\LaraQuiz;
use JamesNM\LaraQuiz\Models\Question;

class QuestionsController extends Controller
{
    public function index(LaraQuiz $quiz)
    {
        return $quiz->questions;
    }

    public function show(Question $question)
    {
        return $question;
    }

    public function store(LaraQuiz $quiz)
    {
        return $quiz->questions()->create(request()->all());
    }

    public function update(Question $question)
    {
        return $question->update(request()->all());
    }

    public function destroy(Question $question)
    {
        return $question->delete();
    }
}