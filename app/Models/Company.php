<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'trn_number',
        'aread_name',
        'building_name',
        'office_number',
        'description',
        'owner_id',
        'city_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function license()
    {
        return $this->morphOne(FileRelationship::class, 'file_relable');
    }

    public function sertificate()
    {
        return $this->morphOne(FileRelationship::class, 'file_relable');
    }
}
