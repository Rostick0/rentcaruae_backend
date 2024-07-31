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
        'is_deposite',
        'is_special',
        'year',
        'seats',
        'min_days',
        'description',
        'deposit_free_per_day',
        'generation_id',
        'category_id',
        'type_car_id',
        'transmission_id',
        'colour_id',
        'colorinterior_id',
        'user_id',
    ];


    public function generation()
    {
        return $this->belongsTo(Generation::class);
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

    public function colorinterior()
    {
        return $this->belongsTo(Colour::class, 'colorinterior_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function price_periods()
    {
        return $this->hasMany(PricePeriod::class);
    }

    public function car_options()
    {
        return $this->hasMany(CarOption::class);
    }
}
