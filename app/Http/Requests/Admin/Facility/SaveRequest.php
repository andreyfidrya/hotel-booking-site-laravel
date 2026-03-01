<?php

namespace App\Http\Requests\Admin\Facility;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $facilityId = $this->route('facility')?->id;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('facilities', 'name')->ignore($facilityId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно для заполнения.',
            'name.max' => 'Название не должно превышать 255 символов.',
            'name.unique' => 'Такое удобство уже существует.',
        ];
    }
}