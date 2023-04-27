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
    public function test_company_route(): void
    {
        $response = $this->get('/companies');

        $response->assertStatus(200);
    }
}
