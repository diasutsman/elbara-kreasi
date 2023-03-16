<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'description' => 'required',
            'additional_information' => 'required',
            'price' => 'required|min_digits:1|max_digits:100',
            'category_id' => 'required',
        ];
    }
}
