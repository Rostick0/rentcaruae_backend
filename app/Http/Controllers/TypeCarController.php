<?php

namespace App\Http\Controllers;

use App\Models\TypeCar;
use Illuminate\Http\Request;

class TypeCarController extends ApiController
{
    public function __construct()
    {
        $this->model = new TypeCar;
    }
}
