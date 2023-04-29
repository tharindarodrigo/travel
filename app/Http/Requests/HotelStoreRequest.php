<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class HotelStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:hotels,name', 'max:255', 'string'],
            'address_line_1' => ['required', 'max:255', 'string'],
            'address_line_2' => ['nullable', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'country' => ['required', 'max:255', 'string'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'description' => ['nullable', 'max:255', 'string'],
            'long_description' => ['nullable', 'max:255', 'string'],
            'active' => ['required', 'boolean'],
        ];
    }
}
