<?php

namespace JamesNM\LaraQuiz\Models;

use Illuminate\Database\Eloquent\Model;
use JamesNM\LaraQuiz\Models\QuestionQuiz;

class LaraQuiz extends Model
{
    protected $table = 'lara_quizzes';

    protected $guarded = [];

    public function creator()
    {
        return $this->morphTo();
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'lara_quiz_question_quiz', 'quiz_id', 'question_id');
    }
}
