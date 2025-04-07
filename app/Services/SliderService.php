<?php

namespace App\Services;


use App\Models\Slider;

class SliderService
{
    protected ImageUploader $uploader;

    public function __construct(ImageUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function create(array $data)
    {
        if(isset($data['image']))
        {
            $data['image'] = $this->uploader->upload($data['image'], 'sliders');
        }
        return Slider::create($data);
    }

    public function update(Slider $slider, array $data)
    {
        if (isset($data['image'])) {
            $this->uploader->delete($slider->image);
            $data['image'] = $this->uploader->upload($data['image'], 'sliders');
        }
        $slider->update($data);
    }

    public function delete(Slider $slider)
    {
        $this->uploader->delete($slider->image);
        $slider->delete();
    }

}
