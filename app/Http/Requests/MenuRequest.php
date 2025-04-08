<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $menuId = $this->route('menu');

        return [
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255|unique:menus,url,' . $menuId,
            'page_title' => 'nullable|string|max:255',
            'page_description' => 'nullable|string|max:500',
        ];
    }
}
