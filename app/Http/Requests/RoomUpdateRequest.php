<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomUpdateRequest extends FormRequest
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
            'hotel_id' => ['required', 'exists:hotels,id'],
            'name' => ['required', 'max:255', 'string'],
            'count' => ['required', 'numeric'],
            'is_active' => ['required', 'boolean'],
            'description' => ['required', 'max:255', 'string'],
        ];
    }
}
