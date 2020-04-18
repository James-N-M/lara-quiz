<?php

namespace JamesNM\LaraQuiz\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'lara_quiz_questions';

    protected $guarded = [];

    public function choices()
    {
        return $this->hasMany(Choice::class, 'question_id');
    }
}
