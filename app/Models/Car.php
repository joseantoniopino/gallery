<?php

namespace App\Models;

use App\Interfaces\IGallery;
use App\Traits\HasGallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model implements IGallery
{
    use HasFactory;
    use HasGallery;

    protected $fillable = [
        'brand',
        'model',
    ];

    public function getName(): string
    {
        return $this->brand . ' ' . $this->model;
    }
}

