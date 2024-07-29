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
            'is_show' => '',
            'is_new' => '',
            'is_luxury' => '',
            'year' => 'required|digits:4|numeric',
            'seats' => 'required|numeric',
            'min_days' => 'nullable|numeric',
            'generation_id' => 'required|' . Rule::exists(Generation::class),
            'type_car_id' => 'required|' . Rule::exists(TypeCar::class),
            'fuel_type_id' => 'required|' . Rule::exists(FuelType::class),
            'transmission_id' => 'required|' . Rule::exists(Transmission::class),
            'color_id' => 'required|' . Rule::exists(Color::class),
            'colorinterior_id' => 'required|' . Rule::exists(Color::class),
        ];
    }
}
