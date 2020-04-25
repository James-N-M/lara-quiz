<?php

use Illuminate\Support\Facades\Route;
use JamesNM\LaraQuiz\Http\Controllers\ChoicesController;
use JamesNM\LaraQuiz\Http\Controllers\LaraQuizzesController;
use JamesNM\LaraQuiz\Http\Controllers\QuestionsController;
use JamesNM\LaraQuiz\Http\Controllers\UserQuestionAnswerController;

// Quizzes
Route::prefix('lara-quiz')->group(function () {
    Route::get('/quizzes', [LaraQuizzesController::class, 'index'])->name('lara-quizzes.index');
    Route::get('/quizzes/create', [LaraQuizzesController::class, 'create'])->name('lara-quizzes.create');
    Route::get('/quizzes/{quiz}', [LaraQuizzesController::class, 'show'])->name('lara-quizzes.show');
    Route::post('/quizzes', [LaraQuizzesController::class, 'store'])->name('lara-quizzes.store');
    Route::put('/quizzes/{quiz}', [LaraQuizzesController::class, 'update'])->name('lara-quizzes.update');
    Route::delete('/quizzes/{quiz}', [LaraQuizzesController::class, 'destroy'])->name('lara-quizzes.destroy');
    Route::get('/questions', [QuestionsController::class, 'index'])->name('lara-quizzes-questions.index');
    Route::get('/questions/create', [QuestionsController::class, 'create'])->name('lara-quizzes-questions.create');
    Route::post('/questions', [QuestionsController::class, 'store'])->name('lara-quizzes-questions.store');
});


// Questions


Route::get('/lara-quizzes/questions/{question}', [QuestionsController::class, 'show'])->name('lara-quizzes-questions.show');
Route::put('/questions/{question}', [QuestionsController::class, 'update'])->name('lara-quizzes-questions.update');
Route::delete('/questions/{question}', [QuestionsController::class, 'destroy'])->name('lara-quizzes-questions.destroy');

// Question Choices
Route::get('/questions/{question}/choices', [ChoicesController::class, 'index'])->name('lara-quizzes-questions-choices.index');
Route::post('/questions/{question}/choices', [ChoicesController::class, 'store'])->name('lara-quizzes-questions-choices.store');
Route::put('/choices/{choice}', [ChoicesController::class, 'update'])->name('lara-quizzes-questions-choices.update');
Route::delete('/choices/{choice}', [LaraQuizzesController::class, 'destroy'])->name('lara-quizzes-questions-choices.destroy');

// User Quiz Question Answers
Route::post('/lara-quizzes/answers', [UserQuestionAnswerController::class, 'store'])->name('lara-quizzes-question-answers.store');



