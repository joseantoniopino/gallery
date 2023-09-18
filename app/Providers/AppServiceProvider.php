<?php

namespace App\Providers;

use App\Interfaces\IGallery;

use App\Models\Post;
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
    }
}
