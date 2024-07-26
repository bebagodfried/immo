<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'surface' => 'required|integer|min:3',
            'rooms' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:0',
            'floor' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'city' => 'required|min:3',
            'address' => 'required|min:3',
            'postal_code' => 'required|min:1',
            'sold' => 'required|boolean',
            'options' => 'array|exists:options,id'
        ];
    }
}
