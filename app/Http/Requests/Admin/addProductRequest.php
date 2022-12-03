<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class addProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'cover_image' => 'required|mimes:png,jpg,jpeg',
            'short_description_ar' => 'required',
            'short_description_en' => 'required',
            'long_description_ar' => 'required',
            'long_description_en' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'discount' => 'nullable'
        ];
    }
}