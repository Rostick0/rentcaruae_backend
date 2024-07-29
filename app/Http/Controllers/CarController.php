<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\StoreCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends ApiController
{
    public function __construct()
    {
        $this->model = new Car;
        $this->store_request = new StoreCarRequest;
        $this->update_request = new UpdateCarRequest;
    }
}
