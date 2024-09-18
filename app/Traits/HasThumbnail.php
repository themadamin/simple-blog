<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Storage;

trait HasThumbnail
{
    protected UploadedFile $file;
    protected string $collection;

    public function uploadFile(UploadedFile $file): static
    {
        $this->file = $file;
        return $this;
    }

    public function toMediaCollection($collection): false|string
    {
        $this->collection = $collection;

        $path = $this->getMediaCollectionPath();

        $filename = uniqid().'.'.$this->file->getClientOriginalName();

        $filePath = $this->file->storeAs($path, $filename, 'public');

        $this->saveFilePathToModel($filePath);

        return $filePath;
    }

    protected function getMediaCollectionPath(): string
    {
        return $this->collection.'/'.$this->id;
    }

    protected function saveFilePathToModel($filePath, $attribute = 'thumbnail'): void
    {
        $this->{$attribute} = $filePath;
        $this->save();
    }

    public function getFileUrl($attribute = 'thumbnail')
    {
        $filePath = $this->getAttribute($attribute);

        if ($filePath) {
            return asset($filePath);
        }

        return null;
    }

    public function clearMediaCollection($attribute = 'thumbnail'): void
    {
        Storage::disk('public')->delete($this->getAttribute($attribute));
    }

}
