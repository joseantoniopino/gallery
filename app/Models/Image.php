<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'alt',
    ];

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'imageable')
            ->withPivot('is_favorite');
    }

    public function cars(): MorphToMany
    {
        return $this->morphedByMany(Car::class, 'imageables')
            ->withPivot('is_favorite');
    }

    public function authors(): MorphToMany
    {
        return $this->morphedByMany(Author::class, 'imageables')
            ->withPivot('is_favorite');
    }
}
