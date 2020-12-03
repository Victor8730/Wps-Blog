<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required',
            'localization[ru][content]' => 'required',
            'localization[uk][content]' => 'required',
            'localization[ru][preview]' => 'required',
            'localization[uk][preview]' => 'required',
            'meta[ru][h1]' => 'required',
            'meta[uk][h1]' => 'required',
            'meta[ru][title]' => 'required',
            'meta[uk][title]' => 'required',
            'meta[ru][description]' => 'required',
            'meta[uk][description]' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'slug.required' => 'slug is required fields',
            'localization[ru][content].required' => 'content required',
            'localization[uk][content].required' => 'content required',
            'localization[ru][preview].required' => 'preview required',
            'localization[uk][preview].required' => 'preview required',
            'meta[ru][h1].required' => 'h1 required',
            'meta[uk][h1].required' => 'h1 required',
            'meta[ru][title].required' => 'title required',
            'meta[uk][title].required' => 'title required',
            'meta[ru][description].required' => 'description required',
            'meta[uk][description].required' => 'description required',
        ];
    }

}
