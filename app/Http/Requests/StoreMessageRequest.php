<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMessageRequest extends FormRequest
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
        $userId = Auth::id();

        return [
            'message' => 'required|string|max:255',
            'user_id' => 'required|numeric|exists:users,id|in:'.$userId,
            'priority' => 'nullable|in:normal,urgent'
        ];
    }

    protected function prepareForValidation()
{
    $this->merge([
        'priority' => $this->input('priority') ? 'urgent' : 'normal',
    ]);
}


    public function messages()
    {
        return ['user_id.in' => 'il messaggio deve essere spedito dall\'utente loggato'];
    }
}
