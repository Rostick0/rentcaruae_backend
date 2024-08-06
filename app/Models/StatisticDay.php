<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatisticDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'date',
        'type',
        'car_id'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
