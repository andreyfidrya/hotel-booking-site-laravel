<?php

namespace App\Http\Requests\Admin\House;

use Illuminate\Foundation\Http\FormRequest;

class Save extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
        'name' => ['required', 'string', 'max:255'],
        'housetype_id' => ['required', 'exists:housetypes,id'],

        'featured_image' => ['required', 'image', 'max:5000'],

        'gallery_images' => ['nullable', 'array', 'max:5'],
        'gallery_images.*' => ['image', 'max:5000'],
        ];
    }
}
