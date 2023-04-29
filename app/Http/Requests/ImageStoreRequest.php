<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageStoreRequest extends FormRequest
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
            'imageable_id' => ['required', 'max:255'],
            'imageable_type' => ['required', 'max:255', 'string'],
            'image' => ['image', 'max:1024', 'required'],
        ];
    }
}
