<?php

namespace App\Http\Requests\Admin\Booking;

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
            'full_name' => ['required', 'min:5', 'string', 'max:70'],
            'phone' => ['required', 'string', 'regex:/^\+380\d{9}$/'],
            'email' => ['nullable', 'string', 'email', 'max:70'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Название обязательно для заполнения.', 
            'full_name.string' => 'Имя должно быть текстом.',           
            'full_name.max' => 'Название не должно превышать 70 символов.',
            'full_name.min' => 'Название не должно быть меньше чем 5 символов.',
            
            'phone.required' => 'Поле телефон обязательно для заполнения.',
            'phone.string' => 'Телефон должен быть строкой.',
            'phone.regex' => 'Телефон должен быть в формате +380XXXXXXXXX.', 
            
            'email.email' => 'Введите корректный адрес электронной почты.',
        ];
    }
}
