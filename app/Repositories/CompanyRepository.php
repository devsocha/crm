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
        return $this->company->all();
    }
}
