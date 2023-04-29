<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateUpdateRequest extends FormRequest
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
            'adults' => ['required', 'max:255'],
            'children' => ['required', 'max:255'],
            'basis' => ['required', 'in:ro,bb,hb,fb,ai'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'price' => ['required', 'numeric'],
            'hotel_id' => ['required', 'exists:hotels,id'],
            'hotel_id' => ['required', 'exists:hotels,id'],
        ];
    }
}
