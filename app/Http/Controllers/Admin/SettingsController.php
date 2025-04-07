<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Settings;
=======
use App\Http\Requests\UpdateSettingsRequest;
use App\Models\Settings;
use App\Services\SettingsService;
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
<<<<<<< HEAD
=======

    public function __construct(protected SettingsService $settingsService){}

>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
    public function index()
    {
        $settings = Settings::first();
        return view('admin.settings.index', compact('settings'));
    }

<<<<<<< HEAD

    public function updateSettings(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'short_address' => 'nullable|string|max:255',
            'youtube' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'general_title' => 'nullable|string|max:255',
            'general_description' => 'nullable|string',
            'general_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $settings = Settings::first();

        if (!$settings) {
            $settings = new Settings();
        }

        if ($request->hasFile('general_photo')) {
            $file = $request->file('general_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/general_photos', $filename);


            if (!empty($settings->general_photo)) {
                Storage::delete('public/general_photos/' . $settings->general_photo);
            }


            $settings->general_photo = $filename;
        }


        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->address = $request->address;
        $settings->short_address = $request->short_address;
        $settings->youtube = $request->youtube;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->general_title = $request->general_title;
        $settings->general_description = $request->general_description;

        $settings->save();

        return redirect()->route('admin.settings.index')->with('success', 'Ayarlar başarıyla güncellendi.');
=======
    public function updateSettings(UpdateSettingsRequest $request)
    {
        $this->settingsService->update($request->validated());

        return redirect()->route('admin.settings.index')->with('success','Ayarlar başarıyla güncellendi.');
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
    }

}
