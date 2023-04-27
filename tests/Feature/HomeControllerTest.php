<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{

    public function test_connection_to_home_page(): void
    {
        $response = $this->get('/home');
        $response->assertOk();
    }


}
