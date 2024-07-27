<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends ApiController
{
    public function __construct()
    {
        $this->model = new Car;
    }
}
