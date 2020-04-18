<?php

namespace JamesNM\LaraQuiz;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use JamesNM\LaraQuiz\Models\LaraQuiz;

class LaraQuizServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */

    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'lara-quiz');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'lara-quiz');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laraquizpackage');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Factories for tests
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/../database/factories');

        Route::group([
            'middleware' => ['web', 'bindings',],
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });



        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('lara-quiz.php'),
            ], 'config');

            if (! class_exists('CreateLaraQuizzesTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_lara_quizzes_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_lara_quizzes_table.php'),
                    __DIR__ . '/../database/migrations/create_lara_quiz_questions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_lara_quiz_questions_table.php'),
                    __DIR__ . '/../database/migrations/create_lara_quiz_question_choices_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_lara_quiz_question_choices_table.php'),
                    __DIR__ . '/../database/migrations/create_lara_quiz_user_question_answers_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_lara_quiz_user_question_answers_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/lara-quiz'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/lara-quiz'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/lara-quiz'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'lara-quiz');

        // Register the main class to use with the facade
        $this->app->singleton('lara-quiz', function () {
            return new LaraQuiz;
        });
    }
}
