<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntityRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'creator' => 'nullable|string',
            'tester' => 'nullable|string',
            'assignee' => 'nullable|string',
            'status' => 'required|string',
            'type' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
        ];
    }
}
