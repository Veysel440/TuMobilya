<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class ImageUploader
{
    public function upload(UploadedFile $file,string $folder): string
    {
        return $file->store($folder,'public');
    }

    public function delete(string $path): void
    {
        Storage::disk('public')->delete($path);
    }
}
