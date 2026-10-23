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
            'house_id' => ['required', 'exists:houses,id'],
            'full_name' => ['required', 'min:5', 'string', 'max:70'],
            'phone' => ['required', 'string', 'regex:/^\+380\d{9}$/'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:70'],
            'adults' => ['required', 'integer', 'min:1'],
            'children' => ['required', 'integer', 'min:0'],
            'arrival_date' => ['required', 'date', 'after_or_equal:today'],
            'departure_date' => ['required', 'date', 'after:arrival_date'],
        ];
    }

    public function messages(): array
    {
        return [            
            'house_id.required' => 'Будь ласка, оберить будинок, який би Ви хотіли замовити',

            'full_name.required' => 'Название обязательно для заполнения.', 
            'full_name.string' => 'Имя должно быть текстом.',           
            'full_name.max' => 'Название не должно превышать 70 символов.',
            'full_name.min' => 'Название не должно быть меньше чем 5 символов.',
            
            'phone.required' => 'Поле телефон обязательно для заполнения.',
            'phone.string' => 'Телефон должен быть строкой.',
            'phone.regex' => 'Телефон должен быть в формате +380XXXXXXXXX.',            
            
            'email.required' => 'Поле адрес электронной почты обязательно для заполнения.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.max' => 'Адрес электронной почты не должен превышать 70 символов.',

            'adults.required' => 'Будь ласка, оберіть кількість дорослих.',

            'children.required' => 'Будь ласка, оберіть кількість дітей.',
            
            'arrival_date.required' => 'Будь ласка, оберіть дату заїзду.',            
            'arrival_date.after_or_equal' => 'Дата заїзду не може бути в минулому.',

            'departure_date.required' => 'Будь ласка, оберіть дату виїзду.', 
            'departure_date.after' => 'Дата виїзду не може бути в минулому.',
        ];
    }
}
