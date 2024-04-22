<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
            'client_job' => 'nullable|string|max:255',
            'client_job_description' => 'nullable|string|max:255',
            'client_CF' => 'required|string|max:16',
            'client_regime' => 'required|in:1,2,3',
            'client_acquisition_date' => 'required|date',
            'client_annual_turnover' => 'nullable|numeric',
            'client_annual_turnover_last_year' => 'nullable|numeric',
            'client_annual_turnover_two_years_ago' => 'nullable|numeric',
            'client_clinic_address' => 'nullable|string|max:255',
            'client_has_employees' => 'nullable',
            'client_has_properties' => 'nullable',
            'client_employee' => 'required|exists:employees,user_id',
            'client_types' => 'required',
        ];
    }
}
