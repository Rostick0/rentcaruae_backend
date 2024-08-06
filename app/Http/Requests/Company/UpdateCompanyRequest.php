<?php

namespace App\Http\Requests\Company;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user.full_name' => 'required|max:255',
            'user.email' => 'required|max:255',
            'user.tel' => 'required|max:25',
            'company.city_id' => 'required|' . Rule::exists(City::class),
            'company.trn_number' => 'required|max:255',
            'company.aread_name' => 'required|max:255',
            'company.building_name' => 'required|max:255',
            'company.office_number' => 'required|max:255',
            'company.description' => 'nullable|max:600',
        ];
    }
}
