<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'tel',
        'full_name',
        'email',
        'period',
        'price',
        'car_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
