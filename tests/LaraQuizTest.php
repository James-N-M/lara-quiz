<?php

namespace JamesNM\LaraQuiz\Tests;

use JamesNM\LaraQuiz\Models\LaraQuiz;
use JamesNM\LaraQuiz\Models\Question;
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

        (new \CreateLaraQuizzesTable)->up();
        (new \CreateLaraQuizQuestionsTable)->up();
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

        $this->get(route('lara-quizzes.index'))->assertStatus(200);
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

    // Questions Test

    /** @test */
    public function it_can_create_a_quiz_question()
    {
        $quiz = factory(LaraQuiz::class)->create();

        $question = [
            'quiz_id' => $quiz->id,
            'question' => "Do you like cheese ?",
        ];

        $this->post(route('lara-quizzes-questions.store',  ['quiz' => $quiz->id, 'question' => $question]));

        $this->assertDatabaseHas('lara_quiz_questions', $question);
    }

    /** @test */
    public function it_can_view_a_quizzes_questions()
    {
        $quiz = factory(LaraQuiz::class)->create();
        $question = factory(Question::class)->create(['quiz_id' => $quiz->id]);

        $this->get(route('lara-quizzes-questions.show'))->assertSee($question->question);
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
