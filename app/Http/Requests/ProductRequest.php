<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //        'name', 'description', 'category', 'brand', 'image', 'price', 'stock'
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',   
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array   
    {
        return [
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',
            'category.required' => 'The category field is required.',
            'state.required' => 'The state field is required.',
            'image.max' => 'The image field must not exceed 255 characters.',
            'brand.max' => 'The brand field must not exceed 255 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'price.min' => 'The price field must be at least 0.',
            'stock.required' => 'The stock field is required.',
            'stock.integer' => 'The stock field must be an integer.',
            'stock.min' => 'The stock field must be at least 0.',
        ];
    }
}
