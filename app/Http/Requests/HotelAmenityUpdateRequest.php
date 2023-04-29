<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class HotelAmenityUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('hotel_amenities', 'name')->ignore(
                    $this->hotelAmenity
                ),
                'max:255',
                'string',
            ],
            'active' => ['required', 'boolean'],
        ];
    }
}
