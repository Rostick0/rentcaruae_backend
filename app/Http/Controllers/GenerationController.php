<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Illuminate\Http\Request;

class GenerationController extends ApiController
{
    public function __construct()
    {
        $this->model = new Generation;
    }
}
