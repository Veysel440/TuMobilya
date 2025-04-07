<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Slider;
=======
use App\Services\SliderService;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
<<<<<<< HEAD
=======
    protected SliderService $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }

<<<<<<< HEAD
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
=======
    public function store(StoreSliderRequest $request)
    {
        $this->sliderService->create($request->validated());
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla eklendi.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

<<<<<<< HEAD
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slider->image);
            $imagePath = $request->file('image')->store('sliders', 'public');
            $slider->image = $imagePath;
        }

        $slider->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
=======
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
      $this->sliderService->update($slider, $request->validated());
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla güncellendi.');
    }

    public function destroy(Slider $slider)
    {
<<<<<<< HEAD
        Storage::disk('public')->delete($slider->image);
        $slider->delete();
=======
        $this->sliderService->delete($slider);
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla silindi.');
    }
}
