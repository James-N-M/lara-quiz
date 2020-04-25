<?php


namespace JamesNM\LaraQuiz\Http\Controllers;
use JamesNM\LaraQuiz\Models\Choice;
use JamesNM\LaraQuiz\Models\Question;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('laraquizpackage::questions.index', compact('questions'));
    }

    public function show(Question $question)
    {
        return $question;
    }

    public function create()
    {
        return view('laraquizpackage::questions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'question' => 'required',
        ]);

        $question = Question::create($attributes);

        for ($choice = 1; $choice <= 4 ; $choice++) {
            $choiceText = request()->input('choice_text_' . $choice, '');
            $isCorrectChoice = request()->input('correct_' . $choice);

            if ($choice != '') {
                Choice::create([
                   'question_id' => $question->id,
                   'choice' => $choiceText,
                   'is_correct_choice' => $isCorrectChoice
                ]);
            }
        }

        return redirect(route('lara-quizzes.index'));
    }

    public function update(Question $question)
    {
        return $question->update(request()->all());
    }

    public function destroy(Question $question)
    {
        return $question->delete();
    }
}