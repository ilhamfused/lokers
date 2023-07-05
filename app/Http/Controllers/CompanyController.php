<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function show(CompanyProfile $company)
    {
        return view('front.company.company', [
            'company' => $company
        ]);
    }
}
