<?php

namespace App\Http\Requests\Car;

use App\Models\Category;
use App\Models\Colour;
use App\Models\FuelType;
use App\Models\Generation;
use App\Models\Transmission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() || true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'is_show' => 'required',
            'is_new' => '',
            'is_luxury' => '',
            'is_deposite'  => '',
            'is_special'  => '',
            'year' => 'required|digits:4|numeric',
            'seats' => 'required|numeric',
            'min_days' => 'nullable|numeric',
            'description' => 'nullable|max:600',
            'fuel_type_id' => 'required|' . Rule::exists(FuelType::class, 'id'),
            'generation_id' => 'required|' . Rule::exists(Generation::class, 'id'),
            'category_id' => 'required|' . Rule::exists(Category::class, 'id'),
            'transmission_id' => 'required|' . Rule::exists(Transmission::class, 'id'),
            'colour_id' => 'required|' . Rule::exists(Colour::class, 'id'),
            'colour_interior_id' => 'required|' . Rule::exists(Colour::class, 'id'),
            'price_sum' => 'required|array',
            'price_sum.*' => 'nullable|integer',
            'price_mileage' => 'required|array',
            'price_mileage.*' => 'nullable|integer',
            'price_is_show' => 'required|array',
            'price_is_show.*' => 'nullable',
            'price_leasing' => 'nullable|array',
            'price_leasing.*' => 'filled|integer',
            'mileage_leasing' => 'nullable|array',
            'mileage_leasing.*' => 'filled|integer',
            'price_special' => 'nullable|array',
            'price_special.*' => 'filled|integer',
            'security_deposit' => 'required|integer',
            'free_per_day_security' => 'filled|integer',
        ];
    }
}
