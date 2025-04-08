<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Slider;
use App\Services\SliderService;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{


    protected SliderService $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }


    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }



    public function store(StoreSliderRequest $request)
    {
        $this->sliderService->create($request->validated());

        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla eklendi.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }



    public function update(UpdateSliderRequest $request, Slider $slider)
    {
      $this->sliderService->update($slider, $request->validated());


        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla güncellendi.');
    }

    public function destroy(Slider $slider)
    {

        Storage::disk('public')->delete($slider->image);
        $slider->delete();
        $this->sliderService->delete($slider);


        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla silindi.');
    }
}
