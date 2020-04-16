<?php

namespace JamesNM\LaraQuiz\Http\Controllers;

use JamesNM\LaraQuiz\Models\LaraQuiz;

class LaraQuizzesController extends Controller
{
    public function index()
    {
        return LaraQuiz::all();
    }

    public function show(LaraQuiz $quiz)
    {
        return $quiz;
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description'  => 'required',
        ]);

        return auth()->user()->quizzes()->create($attributes);
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