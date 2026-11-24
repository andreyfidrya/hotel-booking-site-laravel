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
            'departure_date' => ['required', 'date', 'after_or_equal:today', 'after:arrival_date'],
        ];
    }

    public function messages(): array
    {
        return [            
            'house_id.required' => 'Будь ласка, оберить будинок, який би Ви хотіли замовити',

            'full_name.required' => "Прізвище Ім'я та Побатькові обв'язкове для заповнення", 
            'full_name.string' => "Прізвище Ім'я та Побатькові повино бути текстом.",           
            'full_name.max' => "Прізвище Ім'я та Побатькові повино бути не більше 70 символів.",
            'full_name.min' => "Прізвище Ім'я та Побатькові не повино бути менше 5 символов.",
            
            'phone.required' => "Поле телефон обов'язкове для заповнения.",
            'phone.string' => 'Телефон повинен бути строкою.',
            'phone.regex' => 'Телефон повинен бути в форматі +380XXXXXXXXX.',            
            
            'email.required' => "Поле адреса электронної скриньки обв'язкове для заполнения.",
            'email.email' => 'Введіть корректну адресу электронної скриньки.',
            'email.max' => 'Адреса электронної скриньки повино бути не більше 70 символов.',

            'adults.required' => 'Будь ласка, оберіть кількість дорослих.',

            'children.required' => 'Будь ласка, оберіть кількість дітей.',
            
            'arrival_date.required' => 'Будь ласка, оберіть дату заїзду.',            
            'arrival_date.after_or_equal' => 'Дата заїзду не може бути в минулому.',

            'departure_date.required' => 'Будь ласка, оберіть дату виїзду.', 
            'departure_date.after' => 'Дата виїзду не може бути раніше дати виїзду.',
            'departure_date.after_or_equal' => 'Дата виїзду не може бути в минулому.',
        ];
    }
}
