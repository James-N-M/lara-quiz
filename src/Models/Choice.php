<?php

namespace JamesNM\LaraQuiz\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'lara_quiz_question_choices';

    protected $guarded = [];
}
