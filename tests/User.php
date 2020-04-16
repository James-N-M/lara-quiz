<?php

namespace JamesNM\LaraQuiz\Tests;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use JamesNM\LaraQuiz\Traits\HasQuizzes;

class User extends Model implements AuthorizableContract, AuthenticatableContract
{
    use HasQuizzes, Authorizable, Authenticatable;

    protected $guarded = [];

    protected $table = 'users';
}