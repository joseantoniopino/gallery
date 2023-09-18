<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface IGallery
{
    public function images(): MorphMany;

    public function getImageableName(): string;

    public function getName(): string;
}
