<?php

namespace JamesNM\LaraQuiz\Tests;

use JamesNM\LaraQuiz\Models\LaraQuiz;
use Orchestra\Testbench\TestCase;
use JamesNM\LaraQuiz\LaraQuizServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [LaraQuizServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_lara_quizzes_table.php.stub';
        (new \CreateLaraQuizzesTable)->up();

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

        $this->get(route('lara-quizzes.show', ['id' => $quiz->id]))->assertSee($quiz->name);
    }

    /** @test */
    public function it_can_create_a_quiz()
    {
        $attributes = [
          'name' => "Quiz name",
          'description' => "Quiz Description",
        ];

        $this->post('/lara-quizzes', $attributes);

        $this->assertDatabaseHas('lara_quizzes', $attributes);
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
