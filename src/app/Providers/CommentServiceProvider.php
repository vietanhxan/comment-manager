<?php

namespace VCComponent\Laravel\Comment\Providers;

use Illuminate\Support\ServiceProvider;
use VCComponent\Laravel\Comment\Repositories\CommentRepository;
use VCComponent\Laravel\Comment\Repositories\CommentRepositoryEloquent;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CommentRepository::class, CommentRepositoryEloquent::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'comment');

        $this->publishes([
            __DIR__ . '/../../config/comment.php' => config_path('comment.php'),
            __DIR__ . '/../../resources/sass/comments/_comment.scss' =>base_path('/resources/sass/comments/_comment.scss'),
            __DIR__ . '/../../resources/sass/comments/user.png' => base_path('/public/images/comments/user/png'),
        ]);
    }
}
