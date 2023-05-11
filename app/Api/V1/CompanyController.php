<?php

namespace App\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompany($id)
    {
        $result['status'] = 200;
        try{
            $result['data'] = $this->companyRepository->getCompanyById($id);
        }catch (\Exception $e)
        {
            $result = [
                'status'=>500,
                'message'=>$e->getMessage()
            ];
        }
        return response()->json($result,$result['status']);
    }
}
