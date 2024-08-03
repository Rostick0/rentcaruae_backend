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
        'generation_id',
        'category_id',
        'transmission_id',
        'fuel_type_id',
        'colour_id',
        'colour_interior_id',
        'user_id',
    ];

    public function images()
    {
        return $this->morphMany(ImageRelat::class, 'image_relatsable');
    }
    public function generation()
    {
        return $this->belongsTo(Generation::class);
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function price_periods()
    // {
    //     return $this->hasMany(PricePeriod::class);
    // }

    public function security_deposit()
    {
        return $this->hasOne(PricePeriod::class)->where('type', 'security_deposit');
    }

    public function free_per_day_security()
    {
        return $this->hasOne(PricePeriod::class)->where('type', 'free_per_day_security');
    }

    public function price()
    {
        return $this->hasMany(PricePeriod::class)->where('type', 'price');
    }

    public function price_leasing()
    {
        return $this->hasMany(PricePeriod::class)->where('type', 'price_leasing');
    }

    public function price_special()
    {
        return $this->hasMany(PricePeriod::class)->where('type', 'price_special');
    }


    public function car_options()
    {
        return $this->hasMany(CarOption::class);
    }
}
