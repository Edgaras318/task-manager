<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntityLogRequest extends FormRequest
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
            'entity_id' => 'required|integer|exists:entities,id',
            'action' => 'required|string',
            'old_value' => 'nullable|string',
            'new_value' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'entity_id.required' => 'The entity ID is required.',
            'entity_id.exists' => 'The selected entity ID is invalid.',
        ];
    }
}
