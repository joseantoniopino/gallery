<?php

namespace App\Providers;

use App\Interfaces\IGallery;
use App\Models\Author;
use App\Models\Car;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IGallery::class, Post::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*Relation::morphMap([
            'post' => Post::class,
            'author' => Author::class,
            'car' => Car::class,
        ]);*/
    }
}
