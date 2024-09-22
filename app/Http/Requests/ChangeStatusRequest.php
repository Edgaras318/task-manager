<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => 'required|string|max:50',
        ];
    }

    public function authorize(): bool
    {
        return true; // Adjust authorization as needed
    }
}
