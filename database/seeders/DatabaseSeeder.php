<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Car;
use App\Models\Image;
use App\Models\Location;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(9)->create();

        \File::ensureDirectoryExists(storage_path('app/public/images'));

        Car::factory(10)->create()->each(function (Car $car) {
            $car->images()->saveMany(Image::factory(rand(2, 7))->make());
        });

        Author::factory(5)->create()->each(function (Author $author) {
            $author->images()->saveMany(Image::factory(rand(2, 7))->make());
        });

        Post::factory(20)->create()->each(function (Post $post) {
            $post->images()->saveMany(Image::factory(rand(2, 7))->make());
        });

        Location::factory(50)->create();
    }
}
