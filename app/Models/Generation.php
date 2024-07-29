<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function model_car()
    {
        return $this->belongsTo(ModelCar::class);
    }
}
