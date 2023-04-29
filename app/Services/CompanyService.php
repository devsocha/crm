<?php

namespace App\Services;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->companyRepository->getAll();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function getCompanyByNip(array $data)
    {
        $validator = Validator::make($data, [
            'nip'=>'required'
        ]);

        $nip = str_replace('-','',$data['nip']);
        return $this->companyRepository->getCompanyByNip($nip);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function getCompanyByName(array $data)
    {
        $validator = Validator::make($data, [
            'name'=>'required'
        ]);
        return $this->companyRepository->getCompanyByName($data['name']);
    }

    /**
     * @param array $data
     * @return Company|null
     */
    public function addNewCompany(array $data)
    {
        Validator::make($data,[
            'name'=>'required',
            'nip'=>'required',
            'street'=>'required',
            'city'=>'required',
            'zipCode'=>'required',
        ]);

        $data['nip'] = str_replace('-','',$data['nip']);
        return $this->companyRepository->addNewCompany($data);
    }
    public function updateCompany(array $data)
    {
        Validator::make($data,[
            'id'=>'required',
            'name'=>'required',
            'nip'=>'required',
            'street'=>'required',
            'city'=>'required',
            'zipCode'=>'required',
        ]);

        $data['nip'] = str_replace('-','',$data['nip']);
        return $this->companyRepository->updateCompany($data);
    }

    public function getCompanyById(array $data)
    {
        return $this->companyRepository->getCompanyById($data['id']);
    }

    public function deleteCompany($data)
    {
        Validator::make($data, [
            'id'=>'required'
        ]);
        $this->companyRepository->deleteCompany($data['id']);
    }
}
