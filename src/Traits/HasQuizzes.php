<?php
namespace JamesNM\LaraQuiz\Traits;

use JamesNM\LaraQuiz\Models\LaraQuiz;

// Add documentation to add this to user model of application
/*
 *
// Given we have a User model, using the HasPosts trait
$user = User::first();

// We can create a new post from the relationship
$user->posts()->create([
  'title' => 'Some title',
  'body' => 'Some body',
]);
 * */
trait HasQuizzes
{
    public function quizzes()
    {
        return $this->morphMany(LaraQuiz::class, 'creator');
    }
}