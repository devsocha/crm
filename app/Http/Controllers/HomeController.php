<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Services\ReportService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $reportService;
    protected $companySerivce;
    protected $projectSerivce;
    public function __construct(CompanyService $companyService, ReportService $reportService)
    {
        $this->companySerivce = $companyService;
        $this->reportService = $reportService;
    }

    public function viewHomePage()
    {
        $companies = $this->companySerivce->getAllWithPaginate();
        $sales = $this->reportService->getTopSales();
        return view('home')->with([
            'companies'=>$companies,
            'sales'=>$sales,
        ]);
    }
}
