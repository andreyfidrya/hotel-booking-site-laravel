<?php

namespace App\Http\Requests\Admin\Housetype;

use Illuminate\Foundation\Http\FormRequest;

class Save extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
        $housetypeId = $this->route('housetype')?->id;

        return [
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('housetypes', 'name')->ignore($housetypeId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно для заполнения.',
            'name.max' => 'Название не должно превышать 50 символов.',
            'name.unique' => 'Такой тип домика уже существует.',
        ];
    }
}
