<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use App\Services\CompanyService;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    public function test_add_new_company()
    {
        $company = new CompanyRepository(new Company());
        $data = [
            'name'=>'test',
            'nip'=>'1234',
            'city'=>'test',
            'street'=>'test',
            'zipCode'=>'test',
        ];
        $company->addNewCompany($data);
        $this->assertDatabaseHas('companies',['name'=>'nazwa']);
    }

    public function test_get_company_by_nip()
    {
        $data =[
            'nip'=>'1-2-3-4',
        ];
        $companyService = new CompanyService(new CompanyRepository(new Company()));
        $companyFromDb = $companyService->getCompanyByNip($data);
        $this->assertSame($companyFromDb->nip,'1234');
    }
}
