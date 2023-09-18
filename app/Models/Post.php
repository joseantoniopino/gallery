<?php

namespace App\Models;

use App\Interfaces\IGallery;
use App\Traits\HasGallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements IGallery
{
    use HasFactory;
    use HasGallery;

    protected $fillable = [
        'title',
        'slug',
    ];

    public function getName(): string
    {
        return $this->title;
    }
}
