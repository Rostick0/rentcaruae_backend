<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricePeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'mileage',
        'type',
        'is_show',
        'period',
        'car_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
