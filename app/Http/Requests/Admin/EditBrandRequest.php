<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditBrandRequest extends FormRequest
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
            'name_en' => ['required', Rule::unique('brands', 'name->en')->where('parent_id', $this->parent_id)->ignore($this->route('brand'))],
            'name_ar' => ['required', Rule::unique('brands', 'name->ar')->where('parent_id', $this->parent_id)->ignore($this->route('brand'))],
            'image' => 'nullable|mimes:png,jpg,png'
        ];
    }
}