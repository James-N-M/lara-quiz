<?php

use Illuminate\Support\Facades\Route;
use JamesNM\LaraQuiz\Http\Controllers\LaraQuizzesController;

Route::get('/lara-quizzes', [LaraQuizzesController::class, 'index'])->name('lara-quizzes.index');
Route::get('/lara-quizzes/{id}', [LaraQuizzesController::class, 'show'])->name('lara-quizzes.show');
Route::post('/lara-quizzes', [LaraQuizzesController::class, 'store'])->name('lara-quizzes.store');
