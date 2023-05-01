<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Contact;
use App\Repositories\CompanyRepository;
use App\Repositories\ContactRepository;
use App\Services\CompanyService;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    /*
    public function test_add_new_company_in_service()
    {
        $companyService = new CompanyService(new CompanyRepository(new Company()));
        $data = [
            'name'=>'test',
            'nip'=>'1-2-3-4',
            'city'=>'test',
            'street'=>'test',
            'zipCode'=>'test',
        ];
        $companyService->addNewCompany($data);
        $this->assertDatabaseHas('companies',['name'=>'nazwa']);
    }

    public function test_get_company_by_nip_service()
    {
        $data =[
            'nip'=>'1-2-3-4',
        ];
        $companyService = new CompanyService(new CompanyRepository(new Company()));
        $companyFromDb = $companyService->getCompanyByNip($data);
        $this->assertSame($companyFromDb->nip,'1234');
    }
    public function test_get_company_by_name_service()
    {
        $data =[
            'name'=>'test',
        ];
        $companyService = new CompanyService(new CompanyRepository(new Company()));
        $companyFromDb = $companyService->getCompanyByName($data);
        $this->assertSame($companyFromDb->name,$data['name']);
    }
    public function test_get_company_by_ID_service()
    {
        $data =[
            'id'=>17,
        ];
        $companyService = new CompanyService(new CompanyRepository(new Company()));
        $companyFromDb = $companyService->getCompanyById($data);
        $this->assertSame($companyFromDb->name,'test');
    }
    public function test_get_company_by_ID_repo()
    {
        $id = 17;
        $companyRepo = new CompanyRepository(new Company());
        $companyFromDb = $companyRepo->getCompanyById($id);
        $this->assertSame($companyFromDb->name,'test');
    }

*/
    public function test_get_contact_by_company()
    {
        $text = 'tes';
    $companyService = new CompanyService(new CompanyRepository(new Company()),new ContactRepository(new Contact()));
    $contacts = $companyService->getContactsByCompanyName($text);
    $this->assertSame('test',$contacts[0]['name']);
    }
}
