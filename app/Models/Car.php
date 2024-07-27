<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_show',
        'is_new',
        'is_luxury',
        'seats',
        'security_deposit',
        'deposit_free_per_day',
        'brand_id',
        'model_car_id',
        'type_car_id',
        'fuel_type_id',
        'transmission_id',
        'colour_id',
        'colour_interior_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model_car()
    {
        return $this->belongsTo(ModelCar::class);
    }

    public function type_car()
    {
        return $this->belongsTo(TypeCar::class);
    }

    public function fuel_type()
    {
        return $this->belongsTo(FuelType::class);
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }

    public function colour()
    {
        return $this->belongsTo(Colour::class);
    }

    public function colour_interior()
    {
        return $this->belongsTo(Colour::class, 'colour_interior_id');
    }
}
