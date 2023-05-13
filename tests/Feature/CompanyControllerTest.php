<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Contact;
use App\Repositories\CompanyRepository;
use App\Repositories\ContactRepository;
use App\Services\CompanyService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_company_add_new(): void
    {
        $response = $this->post('/firmy-dodawanie-zatwierdzenie',[
            'name'=>'testowy',
            'nip'=>'12345',
            'street'=>'testowe',
            'city'=>'test',
            'zipCode'=>'12-123'
        ]);

        $response->assertStatus(200);
    }
    public function test_api_add_company()
    {
        $response = $this->post('/api/company-add',[
            'name'=>'testowy234',
            'nip'=>'12345644',
            'street'=>'testowe2',
            'city'=>'test2',
            'zipCode'=>'12-123'
        ]);
        $response->assertStatus(200);
    }

    public function test_api_update_company()
    {
        $data = [
            'id'=>'89',
            'name'=>'test3256',
            'nip'=>'0988',
            'street'=>'test34343',
            'city'=>'test232',
            'zipCode'=>'34-343',
        ];
        $response = $this->put('http://127.0.0.1:8080/api/company-update', $data);
        $response->assertStatus(200);
    }
}
