<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function getAll()
    {
        return $this->company->paginate(10);
    }

    public function addNewCompany($data)
    {
        $company = $this->company;
        $company->name = $data['name'];
        $company->nip = $data['nip'];
        $company->city = $data['city'];
        $company->street = $data['street'];
        $company->zip_code = $data['zipCode'];
        $company->save();
    }

    public function getCompanyByNip($nip)
    {
        return $this->company->where('nip',$nip)->first();
    }

    public function getCompanyByName(mixed $name)
    {
        return $this->company->where('name',$name)->first();
    }
}
