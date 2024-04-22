<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employee_name' => 'required|string|max:255',
            'employee_email' => 'required|email',
            'employee_password' => 'required|string',
            'employee_salary' => 'nullable|numeric',
            'employee_position' => 'nullable|string|max:255',
            'employee_hire_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'employee_name.required' => 'Il nome dell\'impiegato è obbligatorio.',
            'employee_email.required' => 'L\'indirizzo email dell\'impiegato è obbligatorio.',
            'employee_email.email' => 'Inserisci un indirizzo email valido per l\'impiegato.',
            'employee_password.required' => 'La password dell\'impiegato è obbligatoria.',
            'employee_hire_date.required' => 'La data di assunzione dell\'impiegato è obbligatoria.',
            'employee_hire_date.date' => 'Inserisci una data di assunzione valida per l\'impiegato.',
        ];
    }
}
