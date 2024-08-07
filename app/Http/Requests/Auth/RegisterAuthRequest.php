<?php

namespace App\Http\Requests\Auth;

use App\Models\EmailCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterAuthRequest extends FormRequest
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
        $rules = [
            'full_name' => 'required|max:255',
            'tel' => 'required|max:30',
            'email' => 'required|email|unique:users,email|max:255',
            'code' => 'required|' . Rule::exists(EmailCode::class, 'code')->where('email', $this->email),
            'company.name' => 'required|max:255',
            'company.website' => 'required|max:255',
            // 'role' => 'nullable|in:dealer,client',
        ];

        return $rules;
    }
}
