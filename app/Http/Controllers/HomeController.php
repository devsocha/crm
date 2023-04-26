<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $companySerivce;
    protected $projectSerivce;
    public function __construct(CompanyService $companyService)
    {
        $this->companySerivce = $companyService;
    }

    public function viewHomePage()
    {
        $companies = $this->companySerivce->getAll();
        return view('home')->with([
            'companies'=>$companies,
        ]);
    }
}
