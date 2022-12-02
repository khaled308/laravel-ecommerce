<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddCategoryRequest extends FormRequest
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
            'name_en' => ['required', Rule::unique('categories', 'name->en')->where('parent_id', $this->parent_id)],
            'name_ar' => ['required', Rule::unique('categories', 'name->ar')->where('parent_id', $this->parent_id)],
            'image' => 'nullable|mimes:png,jpg,png',
            'parent_id' => 'nullable|exists:categories,id'
        ];
    }
}