<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends ApiController
{
    public function __construct()
    {
        $this->model = new Option;
    }
}
