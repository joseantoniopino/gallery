<?php

namespace App\Livewire;


use App\Interfaces\IGallery;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Gallery extends Component
{
    use WithFileUploads;

    public IGallery $galleryModel;

    public bool $show = false;

    public bool $showManagerModal = false;

    public ?Image $image;

    public string $imageName;

    public string $imageAlt;

    public string $imageExtension;

    public string $oldImageName;

    public bool $success = false;

    public string $successMessage = '';

    public $imageToUpload;

    protected $listeners = [
        'showGallery' => 'showGallery',
        'refreshComponent' => '$refresh',
    ];

    /*REQUEST OPERATIONS*/

    public function storeImage(): void
    {
        $this->validate([
            'imageToUpload' => 'required|image|max:2048', // 2MB Max
        ]);

        $alt = Str::slug(pathinfo($this->imageToUpload->getClientOriginalName(), PATHINFO_FILENAME));

        $this->imageName = $this->imageToUpload->hashName();

        $path = $this->imageToUpload->store();
        $path = Image::DIR . '/' . $path;

        $this->galleryModel->images()->create([
            'path' => $path,
            'alt' => $alt,
        ]);

        $this->imageToUpload = null;

        $this->dispatch('refreshComponent');
    }

    public function saveManagerModal(): void
    {
        $this->validate([
            'imageName' => 'required|string|max:255',
            'imageAlt' => 'required|string|max:255',
        ]);

        $this->imageName = Str::slug($this->imageName, separator: '_');

        try {
            DB::beginTransaction();
            $this->image->update([
                'path' => $this->image::DIR . '/' . $this->imageName . $this->imageExtension,
                'alt' => $this->imageAlt,
            ]);

            Storage::disk('gallery')->move($this->oldImageName . $this->imageExtension, $this->imageName . $this->imageExtension);
            DB::commit();
            $this->toggleManagerModal();
            $this->successMessage = 'Image updated successfully';
            $this->success = true;
            $this->dispatch('refreshComponent');
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }

    public function deleteImage(Image $image): void
    {
        $slicedPath = $this->slicePath($image->path);
        $this->image = $image;
        $this->imageName = $slicedPath[1];
        $this->imageExtension = $slicedPath[2];

        try {
            DB::beginTransaction();
            $this->image->delete();
            Storage::disk('gallery')->delete($this->imageName . $this->imageExtension);
            DB::commit();
            $this->image = Image::make();
            $this->successMessage = 'Image deleted successfully';
            $this->success = true;
            $this->dispatch('refreshComponent');
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }

    public function toggleFavorite(Image $image): void
    {
        $image->update(['is_favorite' => !$image->is_favorite]);
        $this->dispatch('refreshComponent');
    }


    /*HELPERS*/

    public function showGallery(string $nameSpace, int $modelId): void
    {
        $model = $nameSpace::find($modelId)->load('images');
        $this->galleryModel = $model;
        $this->show = true;
    }

    public function hideSuccess(): void
    {
        if ($this->success === true) {
            $this->success = false;
        }
    }

    public function toggleManagerModal(?Image $image = null): void
    {
        $this->showManagerModal = !$this->showManagerModal;
        if (!is_null($image) && $this->showManagerModal === true) {
            $this->hideSuccess();
            $slicedPath = $this->slicePath($image->path);
            $this->image = $image;
            $this->oldImageName = $slicedPath[1];
            $this->imageName = $slicedPath[1];
            $this->imageAlt = $image->alt;
            $this->imageExtension = $slicedPath[2];
        }
    }

    public function close(): void
    {
        $this->hideSuccess();
        if ($this->showManagerModal) {
            $this->toggleManagerModal();
            return;
        }
        $this->show = false;
    }

    /*PRIVATE*/

    private function slicePath(string $imagePath): array
    {
        // Find the last occurrence of the '/' character to get the position of the last slash
        $lastSlashPosition = strrpos($imagePath, '/');

        // Get the folder and the filename from the position of the last slash
        $folder = substr($imagePath, 0, $lastSlashPosition + 1);
        $fileNameWithExtension = substr($imagePath, $lastSlashPosition + 1);

        // Find the position of the last dot in the filename to get the extension
        $lastDotPosition = strrpos($fileNameWithExtension, '.');

        // Get the file extension from the position of the last dot
        $fileExtension = substr($fileNameWithExtension, $lastDotPosition);

        // Remove the extension from the filename
        $fileName = substr($fileNameWithExtension, 0, $lastDotPosition);

        // Return the elements in an array
        return [$folder, $fileName, $fileExtension];
    }

}
