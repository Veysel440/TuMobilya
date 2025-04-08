<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Settings;

class SettingsPhotoUploader
{
    public function handle(UploadedFile $file, ?string $oldFile = null): string
    {
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/general_photos', $filename);

        if (!empty($oldFile)) {
            Storage::delete('public/general_photos/' . $oldFile);
        }

        return $filename;
    }
}
