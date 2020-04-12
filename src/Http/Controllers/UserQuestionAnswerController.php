<?php


namespace JamesNM\LaraQuiz\Http\Controllers;

use JamesNM\LaraQuiz\Models\Choice;
use JamesNM\LaraQuiz\Models\UserQuestionAnswer;

class UserQuestionAnswerController
{
    public function store(): void
    {
        $user_id = 1; // placeholder

        foreach(request()->all() as $choice) {
            $choice = Choice::find($choice);
            if($choice->is_correct_choice) {
                UserQuestionAnswer::create([
                    'user_id' => $user_id,
                    'question_id' => $choice->question->id,
                    'choice_id' => $choice->id,
                    'is_correct' => true,
                ]);
            } else {
                UserQuestionAnswer::create([
                    'user_id' => $user_id,
                    'question_id' => $choice->question->id,
                    'choice_id' => $choice->id,
                    'is_correct' => false,
                ]);
            }
        }
    }
}