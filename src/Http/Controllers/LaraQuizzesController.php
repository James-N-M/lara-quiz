<?php

namespace JamesNM\LaraQuiz\Http\Controllers;

use JamesNM\LaraQuiz\Models\LaraQuiz;

class LaraQuizzesController extends Controller
{
    public function index()
    {
        return LaraQuiz::all();
    }

    public function show(int $id)
    {
        return LaraQuiz::find($id);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description'  => 'required',
        ]);

        return LaraQuiz::create($attributes);
    }
}