<?php

use Illuminate\Support\Facades\Route;
use JamesNM\LaraQuiz\Http\Controllers\LaraQuizzesController;
use JamesNM\LaraQuiz\Http\Controllers\QuestionsController;

    // Quiz Routes
    Route::get('/lara-quizzes', [LaraQuizzesController::class, 'index'])->name('lara-quizzes.index');
    Route::get('/lara-quizzes/{quiz}', [LaraQuizzesController::class, 'show'])->name('lara-quizzes.show');
    Route::post('/lara-quizzes', [LaraQuizzesController::class, 'store'])->name('lara-quizzes.store');

    // Question Routes
    Route::post('/lara-quizzes/{quiz}/questions', [QuestionsController::class, 'store'])->name('lara-quizzes-questions.store');
    Route::get('/lara-quizzes/{quiz}/questions', [QuestionsController::class, 'index'])->name('lara-quizzes-questions.index');


