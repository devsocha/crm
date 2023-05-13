<?php

namespace App\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function getCompany($id)
    {
        $data['id']= $id;
        $result['status'] = 200;
        try{
            $result['data'] = $this->companyService->getCompanyById($data);
        }catch (\Exception $e)
        {
            $result = [
                'status'=>500,
                'message'=>$e->getMessage(),
            ];
        }
        return response()->json($result,$result['status']);
    }
    public function getAllCompanies()
    {
        $result['status'] = 200;
        try{
            $result['data'] = $this->companyService->getAll();
        }catch (\Exception $e)
        {
            $result = [
                'status'=>500,
                'message'=>$e->getMessage()
            ];
        }
        return response()->json($result,$result['status']);
    }

    public function addCompany(Request $request)
    {
        $data = $request->only([
            'name',
            'nip',
            'street',
            'city',
            'zipCode',
        ]);
        $result['status'] = 200;
        try{
            $result['data'] = $this->companyService->addNewCompany($data);
        }catch (\Exception $e)
        {
            $result = [
                'status'=>500,
                'message'=>$e->getMessage()
            ];
        }
        return response()->json($result,$result['status']);
    }

    public function updateCompany(Request $request)
    {
        $data = $request->only([
            'id',
            'name',
            'nip',
            'street',
            'city',
            'zipCode',
        ]);
        $result['status'] = 200;
        try{
            $result['data'] = $this->companyService->updateCompany($data);
        }catch (\Exception $e)
        {
            $result = [
                'status'=>500,
                'message'=>$e->getMessage()
            ];
        }
        return response()->json($result,$result['status']);
    }

    public function deleteCompany($id)
    {
        $data['id'] = $id;
        $result['status'] = 200;
        try{
            $this->companyService->deleteCompany($data);
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
