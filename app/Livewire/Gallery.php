<?php

namespace App\Livewire;


use App\Interfaces\IGallery;
use App\Models\Image;
use Livewire\Component;

class Gallery extends Component
{
    public IGallery $galleryModel;
    public bool $show = false;
    public ?Image $currentImage = null;

    protected $listeners = [
        'showGallery' => 'showGallery',
        'refreshComponent' => '$refresh',
    ];

    public function showGallery(string $nameSpace, int $modelId): void
    {
        $model = $nameSpace::find($modelId)->load('images');
        $this->galleryModel = $model;
        $this->show = true;
    }

    public function close(): void
    {
        $this->show = false;
    }

    public function toggleFavorite(Image $image): void
    {
        $image->update(['is_favorite' => !$image->is_favorite]);
        $this->dispatch('refreshComponent');
    }

}
