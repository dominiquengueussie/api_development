<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'name' => ['required', 'string'],
            'status' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'Le champ utilisateur est requis.',
            'name.required' => 'Le champ nom est requis.',
            'status.required' => 'Le champ statut est requis.'
        ];
    }
}