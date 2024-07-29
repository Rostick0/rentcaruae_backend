<?php

namespace App\Http\Requests\Car;

use App\Models\FuelType;
use App\Models\Generation;
use App\Models\Transmission;
use App\Models\TypeCar;
use Faker\Core\Color;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCarRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'is_show' => 'filled',
            'is_new' => '',
            'is_luxury' => '',
            'is_deposite'  => '',
            'is_special'  => '',
            'year' => 'filled|digits:4|numeric',
            'seats' => 'filled|numeric',
            'min_days' => 'nullable|numeric',
            'description' => 'nullable|max:600',
            'generation_id' => 'filled|' . Rule::exists(Generation::class),
            'type_car_id' => 'filled|' . Rule::exists(TypeCar::class),
            'fuel_type_id' => 'filled|' . Rule::exists(FuelType::class),
            'transmission_id' => 'filled|' . Rule::exists(Transmission::class),
            'colour_id' => 'filled|' . Rule::exists(Color::class),
            'colorinterior_id' => 'filled|' . Rule::exists(Color::class),
        ];
    }
}
