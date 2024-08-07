<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'week_day',
        'start',
        'end',
        'is_show',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
