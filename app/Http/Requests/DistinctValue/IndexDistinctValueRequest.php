<?php

namespace App\Http\Requests\DistinctValue;

use Illuminate\Foundation\Http\FormRequest;

class IndexDistinctValueRequest extends FormRequest
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
            'table' => 'required|max:255',
            'column' => 'required|max:255',
            'limit' => 'nullable|numeric|max:150',
        ];
    }
}
