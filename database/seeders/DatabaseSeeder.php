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
        Car::factory(20)->create();
        Author::factory(5)->create();
        Post::factory(50)->create();
        Location::factory(50)->create();
        Image::factory(100)->create();
    }
}
