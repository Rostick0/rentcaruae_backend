<?php

namespace App\Http\Controllers;

use App\Models\ModelCar;
use Illuminate\Http\Request;

class ModelCarController extends ApiController
{
    public function __construct()
    {
        $this->model = new ModelCar;
    }
}
