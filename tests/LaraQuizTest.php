<?php

namespace JamesNM\LaraQuiz\Tests;

use JamesNM\LaraQuiz\Models\LaraQuiz;
use JamesNM\LaraQuiz\Models\Question;
use JamesNM\LaraQuiz\Models\Choice;
use Orchestra\Testbench\TestCase;
use JamesNM\LaraQuiz\LaraQuizServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaraQuizTest extends TestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [LaraQuizServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_lara_quizzes_table.php.stub';
        include_once __DIR__.'/../database/migrations/create_lara_quiz_questions_table.php.stub';
        include_once __DIR__.'/../database/migrations/create_lara_quiz_question_choices_table.php.stub';

        (new \CreateLaraQuizzesTable)->up();
        (new \CreateLaraQuizQuestionsTable)->up();
        (new \CreateLaraQuizQuestionChoicesTable)->up();
    }

    /** @test */
    public function it_can_access_the_database()
    {
        $quiz = new LaraQuiz();
        $quiz->name = "Quiz Name";
        $quiz->description = "this is a description of a laravel quiz";
        $quiz->save();

        $newQuiz = LaraQuiz::find($quiz->id);

        $this->assertSame($newQuiz->name, 'Quiz Name');
    }

    // Quizzes Tests

    /** @test */
    public function it_can_view_quizzes()
    {
        factory(LaraQuiz::class)->create();

        $this->get(route('lara-quizzes.index'))->assertOk();
    }

    /** @test */
    public function it_can_view_a_quiz()
    {
        $quiz = factory(LaraQuiz::class)->create();

        $this->get(route('lara-quizzes.show', ['quiz' => $quiz->id]))->assertSee($quiz->name);
    }

    /** @test */
    public function it_can_create_a_quiz()
    {
        $quiz = [
          'name' => "Quiz name",
          'description' => "Quiz Description",
        ];

        $this->post(route('lara-quizzes.store', $quiz));

        $this->assertDatabaseHas('lara_quizzes', $quiz);
    }

    /** @test */
    public function it_can_update_a_quiz()
    {
        $quiz = factory(LaraQuiz::class)->create();

        $attributes = [
            'name' => "Updated name",
            'description' => "Updated description"
        ];

        $this->put(route('lara-quizzes.update', ['quiz' => $quiz]), $attributes);

        $this->assertDatabaseHas('lara_quizzes', $attributes);
    }

    /** @test */
    public function it_can_delete_a_quiz()
    {
        $quiz = factory(LaraQuiz::class)->create(['name' => "Delete me"]);

        $this->delete(route('lara-quizzes.destroy', ['quiz' => $quiz]));

        $this->assertDatabaseMissing('lara_quizzes', ['name' => 'Delete me']);
    }

    // Questions Test

    /** @test */
    public function it_can_create_a_quiz_question()
    {
        $quiz = factory(LaraQuiz::class)->create();

        $question = [
            'quiz_id' => $quiz->id,
            'question' => "Do you like cheese ?",
        ];

        $this->post(route('lara-quizzes-questions.store', ['quiz' => $quiz->id]), $question);

        $this->assertDatabaseHas('lara_quiz_questions', $question);
    }

    /** @test */
    public function it_can_view_a_quizzes_questions()
    {
        $question = factory(Question::class)->create();

        $this->get(route('lara-quizzes-questions.index', $question->quiz_id))->assertOk();
    }

    /** @test */
    public function it_can_view_a_question()
    {
        $question = factory(Question::class)->create();

        $this->get(route('lara-quizzes-questions.show', $question->id))->assertSee($question->question);
    }

    /** @test */
    public function it_can_update_a_question()
    {
        $question = factory(Question::class)->create();

        $attributes = [
            'question' => "Updated question"
        ];

        $this->put(route('lara-quizzes-questions.update', $question->id), $attributes);

        $this->assertDatabaseHas('lara_quiz_questions', $attributes);
    }

    /** @test */
    public function it_can_delete_a_question()
    {
        $question = factory(Question::class)->create(['question' => "Delete me"]);

        $this->delete(route('lara-quizzes-questions.destroy', $question->id));

        $this->assertDatabaseMissing('lara_quiz_questions', ['name' => 'Delete me']);
    }

    /** Quiz Question Choices */

    /** @test */
    public function it_can_create_a_question_choice()
    {
        $question = factory(Question::class)->create();

        $choice = [
            'question_id' => $question->id,
            'choice' => "Yes",
            "is_correct_choice" => true
        ];

        $this->post(route('lara-quizzes-questions-choices.store', ['question' => $question->id]), $choice);

        $this->assertDatabaseHas('lara_quiz_question_choices', $choice);
    }

    /** @test */
    public function it_can_view_a_questions_choices()
    {
        $choice = factory(Choice::class)->create();

        $this->get(route('lara-quizzes-questions-choices.index', $choice->question_id))->assertOk();
    }

    /** @test */
    public function it_can_update_a_choice()
    {
        $choice = factory(Choice::class)->create();

        $attributes = [
            'choice' => "Updated choice"
        ];

        $this->put(route('lara-quizzes-questions-choices.update', $choice->id), $attributes);

        $this->assertDatabaseHas('lara_quiz_question_choices', $attributes);
    }

    /** @test */
    public function it_can_delete_a_choice()
    {
        $choice = factory(Choice::class)->create(['choice' => "Delete me"]);

        $this->delete(route('lara-quizzes-questions-choices.destroy', ['choice' => $choice]));

        $this->assertDatabaseMissing('lara_quiz_question_choices', ['name' => 'Delete me']);
    }

    /* User Question Answers **/

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
