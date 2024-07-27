<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends ApiController
{
    public function __construct()
    {
        $this->model = new Brand;
    }
}
