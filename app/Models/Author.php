<?php

namespace App\Models;

use App\Interfaces\IGallery;
use App\Traits\HasGallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model implements IGallery
{
    use HasFactory;
    use HasGallery;

    protected $fillable = [
        'name',
        'age',
    ];

    public function getName(): string
    {
        return $this->name;
    }
}
