<?php

namespace App\Services;

use App\Models\Settings;

class SettingsService
{
    public function __construct
    (
        protected SettingsPhotoUploader $uploader
    ){}

    public function update(array $data):Settings
    {
        $settings = Settings::first() ?? new Settings();

        if (isset($data['general_photo']) && $data['general_photo'] instanceof \Illuminate\Http\UploadedFile) {
            $data['general_photo'] = $this->uploader->handle($data['general_photo'], $settings->general_photo);
        } else {
            unset($data['general_photo']);
        }

        $settings->fill($data);
        $settings->save();

        return $settings;

    }
}
