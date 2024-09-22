<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'comment' => 'required|string',
            'parent_id' => 'nullable|integer|exists:comments,id',
        ];
    }

    public function authorize(): bool
    {
        return true; // Adjust authorization as needed
    }
}
