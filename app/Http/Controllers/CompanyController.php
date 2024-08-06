<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends ApiController
{
    public function __construct()
    {
        $this->model = new Company;
        $this->update_request = new UpdateCompanyRequest;
    }
}
