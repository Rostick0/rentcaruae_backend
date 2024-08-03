<?php

namespace App\Http\Requests\Operation;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCarRequest extends FormRequest
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
            'without_deposite' => 'nullable',
            'tel' => 'required|max:25',
            'full_name' => 'required|max:255',
            'email' => 'email|max:255',
            'period' => 'required|numeric',
            'car_id' => 'required|' . Rule::exists(Car::class, 'id'),
            'is_agree' => 'required|accepted'
        ];
    }
}
