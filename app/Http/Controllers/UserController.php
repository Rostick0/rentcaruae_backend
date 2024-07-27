<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function __construct()
    {
        $this->model = new User;
    }
}
