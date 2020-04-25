<?php

namespace JamesNM\LaraQuiz\Http\Controllers;

use JamesNM\LaraQuiz\Models\LaraQuiz;
use JamesNM\LaraQuiz\Models\Question;

class LaraQuizzesController extends Controller
{
    public function index()
    {
        $quizzes = LaraQuiz::all();
        return view('laraquizpackage::quizzes.index', compact('quizzes'));
    }

    public function show(LaraQuiz $quiz)
    {
        return view('laraquizpackage::quizzes.show', compact('quiz'));
    }

    public function create()
    {
        $questions = Question::all();

        return view('laraquizpackage::quizzes.create', compact('questions'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description'  => 'required'
        ]);

        $quiz = auth()->user()->quizzes()->create($attributes);

        foreach(request('questions') as $questionId) {
            $quiz->questions()->attach($questionId);
        }

        return redirect(route('lara-quizzes.index'));
    }

    public function update(LaraQuiz $quiz)
    {
        return $quiz->update(request()->all());
    }

    public function destroy(LaraQuiz $quiz)
    {
        return $quiz->delete();
    }
}