<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use Illuminate\Http\Request;

class FuelTypeController extends ApiController
{
    public function __construct()
    {
        $this->model = new FuelType;
    }
}
