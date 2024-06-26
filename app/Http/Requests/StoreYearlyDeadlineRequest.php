<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreYearlyDeadlineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo('create_deadlines');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'deadline_name' => 'required|string|max:255', 
            'deadline_description' => 'nullable|string', 
            'deadline_date' => 'required|date',
            'client_types' => 'required|array', // Assicurati che i client_types siano un array
            'client_types.*' => 'exists:client_types,id', // Assicurati che ogni client_type esista nella tabella client_types
        ];
    }
}
