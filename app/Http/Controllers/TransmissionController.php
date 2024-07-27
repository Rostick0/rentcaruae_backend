<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends ApiController
{
    public function __construct()
    {
        $this->model = new Transmission;
    }
}
