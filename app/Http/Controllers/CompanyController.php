<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyService->getAll();
        return view('company')->with(['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'nip',
            'street',
            'city',
            'zipCode',
        ]);
        $result = ['status'=>200];
        try{
            $result['data'] = $this->companyService->addNewCompany($data);
        }catch (\Exception $e)
        {
            $result = [
                'status'=> 500,
                'message'=>$e->getMessage(),
            ];
        }
        return view('showCompany')->with(['company'=>$result['data']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = ['id'=>$id];
        $company = $this->companyService->getCompanyById($data);
        return view('showCompany')->with(['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = ['id'=>$id];
        $company = $this->companyService->getCompanyById($data);
        return view('editCompany')->with(['company'=>$company]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->only([
            'id',
            'name',
            'nip',
            'street',
            'city',
            'zipCode',
        ]);
        $result = ['status'=>200];
        try{
            $result['data'] = $this->companyService->updateCompany($data);
        }catch (\Exception $e)
        {
            $result = [
                'status'=> 500,
                'message'=>$e->getMessage(),
            ];
            echo $result['message'];
        }
        return view('showCompany')->with(['company'=>$result['data']]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
