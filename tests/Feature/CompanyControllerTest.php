<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
