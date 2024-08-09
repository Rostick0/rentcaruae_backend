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
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules($args): array
    {
        return [
            'user.email' => ['filled', 'email', 'unique:users,email,' . auth()->id(), 'max:255'],
            'user.tel' => 'nullable|max:25',
            'company.name' => 'filled|max:255',
            'company.city_id' => 'filled|' . Rule::exists(City::class),
            'company.trn_number' => 'filled|max:255',
            'company.aread_name' => 'filled|max:255',
            'company.building_name' => 'filled|max:255',
            'company.office_number' => 'filled|max:255',
            'company.description' => 'nullable|max:600',
            'company_schedules.*' => 'filled|array|size:7',
            'company_schedules.start.*' => 'filled|date_format:H:i:s',
            'company_schedules.end.*' => 'filled|date_format:H:i:s|after:company_schedules.start.*',
            'company_schedules.is_show.*' => '',
        ];
    }
}
