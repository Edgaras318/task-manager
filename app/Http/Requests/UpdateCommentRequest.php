<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required|string',
            'parent_id' => 'nullable|integer|exists:comments,id', // For replies
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'A comment is required.',
            'comment.string' => 'The comment must be a string.',
            'parent_id.integer' => 'The parent ID must be an integer.',
            'parent_id.exists' => 'The selected parent ID is invalid.',
        ];
    }
}
