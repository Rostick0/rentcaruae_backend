<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'option_id'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
