<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends ApiController
{
    public function __construct()
    {
        $this->model = new Country;
    }
}
