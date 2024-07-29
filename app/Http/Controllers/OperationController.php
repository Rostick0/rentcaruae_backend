<?php

namespace App\Http\Controllers;

use App\Http\Requests\Operation\StoreCarRequest;
use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends ApiController
{
    public function __construct()
    {
        $this->model = new Operation;
        $this->store_request = new StoreCarRequest;
    }
}
