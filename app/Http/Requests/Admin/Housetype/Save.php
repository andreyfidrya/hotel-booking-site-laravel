<?php

namespace App\Http\Requests\Admin\Housetype;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
             'description' => [
                'required',
                'string',
                'max:500',                
            ],
            'capacity' => [
                'required',
                'integer',
                'min:1',
                'max:10',                
            ],
            'area' => [
                'required',
                'integer', 
                'max:250',                              
            ],
            'price_per_extra_person' => [
                'required',
                'integer',                               
            ],
            'price_on_business_days' => [
                'required',
                'integer',                               
            ],
            'price_on_weekends' => [
                'required',
                'integer',                               
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно для заполнения.',            
            'name.max' => 'Название не должно превышать 50 символов.',
            'name.unique' => 'Такой тип домика уже существует.',
            
            'description.required' => 'Название обязательно для заполнения.',
            'description.max' => 'Название не должно превышать 500 символов.',
            
            'area.required' => 'Площадь обязательно для заполнения.',
            'area.max' => 'Площадь не должна превышать 250 м²',
            
            'price_per_extra_person.required' => 'Цена за дополнительного человека обязательно для заполнения.',             
        ];
    }
}
