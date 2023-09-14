<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Car;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'path' => $this->faker
                ->image('public/images', 336, 300),
            'alt' => $this->faker->word(),
            'is_favorite' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
