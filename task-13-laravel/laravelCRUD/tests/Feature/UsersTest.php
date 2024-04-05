<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
   use RefreshDatabase;
    public function test_users_table_is_empty()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}


