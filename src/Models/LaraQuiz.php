<?php

namespace JamesNM\LaraQuiz\Models;

use Illuminate\Database\Eloquent\Model;

class LaraQuiz extends Model
{
    protected $table = 'lara_quizzes';

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class, 'id', 'quiz_id');
    }
}
