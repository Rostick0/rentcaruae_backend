<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use Illuminate\Http\Request;

class ColourController extends ApiController
{
    public function __construct()
    {
        $this->model = new Colour;
    }
}
