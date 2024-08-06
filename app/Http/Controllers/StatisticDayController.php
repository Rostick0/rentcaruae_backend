<?php

namespace App\Http\Controllers;

use App\Models\StatisticDay;
use Illuminate\Http\Request;

class StatisticDayController extends ApiController
{
    public function __construct()
    {
        $this->model = new StatisticDay;
    }
}
