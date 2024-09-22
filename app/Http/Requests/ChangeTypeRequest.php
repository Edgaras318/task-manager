<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'required|string|max:50',
        ];
    }

    public function authorize(): bool
    {
        return true; // Adjust authorization as needed
    }
}
