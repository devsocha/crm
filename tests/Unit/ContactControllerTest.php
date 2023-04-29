<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Contact;
use App\Repositories\CompanyRepository;
use App\Repositories\ContactRepository;
use App\Services\CompanyService;
use App\Services\ContactService;
use tests\TestCase;

class ContactControllerTest extends TestCase
{
    public function test_update_contact()
    {
        $data=[
            'id'=>'3',
            'name'=>'nowy',
            'email'=>'nowy@nowy.pl',
            'phone'=>'123-233-233',
            'position'=>'Junior IT Engineer',
        ];
        $contactService = new ContactService(new ContactRepository(new Contact()));
        $newContact = $contactService->updateContact($data);
        $this->assertDatabaseHas('contacts',$data);
    }

    public function test_delete_service()
    {
        $id = 5;
        $contactService = new ContactService(new ContactRepository(new Contact()));
        $contactService->deleteContact($id);
        $this->assertDatabaseMissing('contacts',['id'=>$id]);
    }
}
