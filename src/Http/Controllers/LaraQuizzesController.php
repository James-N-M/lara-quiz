<?php

namespace JamesNM\LaraQuiz\Http\Controllers;

use JamesNM\LaraQuiz\Models\LaraQuiz;

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
        return view('laraquizpackage::quizzes.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description'  => 'required',
        ]);

        auth()->user()->quizzes()->create($attributes);

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