<?php

use Illuminate\Support\Facades\Route;
use JamesNM\LaraQuiz\Http\Controllers\ChoicesController;
use JamesNM\LaraQuiz\Http\Controllers\LaraQuizzesController;
use JamesNM\LaraQuiz\Http\Controllers\QuestionsController;

// Quiz Routes
Route::get('/lara-quizzes', [LaraQuizzesController::class, 'index'])->name('lara-quizzes.index');
Route::get('/lara-quizzes/{quiz}', [LaraQuizzesController::class, 'show'])->name('lara-quizzes.show');
Route::post('/lara-quizzes', [LaraQuizzesController::class, 'store'])->name('lara-quizzes.store');
Route::put('/lara-quizzes/{quiz}', [LaraQuizzesController::class, 'update'])->name('lara-quizzes.update');

// Question Routes
Route::get('/lara-quizzes/{quiz}/questions', [QuestionsController::class, 'index'])->name('lara-quizzes-questions.index');
Route::post('/lara-quizzes/{quiz}/questions', [QuestionsController::class, 'store'])->name('lara-quizzes-questions.store');
Route::put('/questions/{question}', [QuestionsController::class, 'update'])->name('lara-quizzes-questions.update');

// Question Choices
Route::post('/questions/{question}/choices', [ChoicesController::class, 'store'])->name('lara-quizzes-questions-choices.store');



