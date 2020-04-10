<?php

namespace JamesNM\LaraQuiz;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JamesNM\LaraQuiz\Skeleton\SkeletonClass
 */
class LaraQuizFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lara-quiz';
    }
}
