<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Settings;
use App\Http\Requests\UpdateSettingsRequest;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function __construct(protected SettingsService $settingsService){}

    public function index()
    {
        $settings = Settings::first();
        return view('admin.settings.index', compact('settings'));
    }


    public function updateSettings(UpdateSettingsRequest $request)
    {
        $this->settingsService->update($request->validated());
        return redirect()->route('admin.settings.index')->with('success','Ayarlar başarıyla güncellendi.');
    }

}
