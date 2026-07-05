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
        'name' => ['required', 'string', 'min:3', 'max:255'],
        'housetype_id' => ['required', 'exists:housetypes,id'],

        'featured_image' => ['required', 'image', 'max:5000'],

        'gallery_images' => ['required', 'nullable', 'array', 'max:5'],
        'gallery_images.*' => ['image', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно для заполнения.',            
            'name.max' => 'Название не должно превышать 255 символов.',
            'name.min' => 'Название не должно быть меньше чем 3 символа.',
            'featured_image' => 'У домика должно быть главное изображение.',                        
            'housetype_id' => 'Не указан тип домика.',
            'gallery_images.max' => 'Максимальное количество картинок не должно превышать 5.',
            'gallery_images.required' => 'У домика должны быть изображения галереии.',
        ];
    }
}
