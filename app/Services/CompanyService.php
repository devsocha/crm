<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Validator;


class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getAll()
    {
        return $this->companyRepository->getAll();
    }

    public function getCompanyByNip(array $data)
    {
        $validator = Validator::make($data, [
            'nip'=>'required'
        ]);

        $nip = str_replace('-','',$data['nip']);
        return $this->companyRepository->getCompanyByNip($nip);
    }

    public function getCompanyByName(array $data)
    {
        $validator = Validator::make($data, [
            'name'=>'required'
        ]);
        return $this->companyRepository->getCompanyByName($data['name']);
    }
}
