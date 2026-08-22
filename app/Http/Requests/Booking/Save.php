<?php

namespace App\Http\Requests\Booking;

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
            'house_id' => ['required', 'exists:houses,id'],

            'arrival_date' => ['required', 'date', 'after_or_equal:today'],
            'departure_date' => ['required', 'date', 'after:arrival_date'],

            'adults' => ['required', 'integer', 'min:1'],
            'children' => ['required', 'integer', 'min:0'],

            'pets' => ['nullable', 'boolean'],

            'full_name' => ['required', 'string', 'max:255'],

            'phone' => [
                'required',
                'regex:/^\+380\d{9}$/'
            ],

            'email' => ['required', 'email', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'arrival_date.after_or_equal' => 'Дата заезда не может быть в прошлом.',
            'departure_date.after' => 'Дата выезда должна быть позже даты заезда.',

            'phone.regex' => 'Введите номер в формате +380XXXXXXXXX.',
        ];
    }
}
