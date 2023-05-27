<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyRepository
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function getAllWithPaginate()
    {
        return $this->company->paginate(10);
    }
    public function getAllCompanyContacts($data)
    {
        $company = $this->getCompanyById($data['id']);
        return $company->contacts;
    }
    public function getByNotFullName($text)
    {
        return $this->company->where('name','LIKE','%'.$text.'%')->get();
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
        return $company->fresh();
    }

    public function updateCompany($data)
    {
        $company = $this->company->where('id',$data['id'])->first();
        $company->name = $data['name'];
        $company->nip = $data['nip'];
        $company->city = $data['city'];
        $company->street = $data['street'];
        $company->zip_code = $data['zipCode'];
        $company->save();
        return $company->fresh();
    }

    public function getCompanyByNip($nip)
    {
        return $this->company->where('nip',$nip)->first();
    }

    public function getCompanyByName(mixed $name)
    {
        return $this->company->where('name',$name)->first();
    }
    public function getCompanyById($id)
    {
        return $this->company->where('id',$id)->first();
    }

    public function deleteCompany($id)
    {
        $this->company->where('id',$id)->delete();
    }

    public function getAll()
    {
        return $this->company->all();
    }

    public function getAllCreatedCompanyInLastMonth()
    {
        
    }
}
