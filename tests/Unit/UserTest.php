<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register()
    {
        $data = [
           'name' => 'jules',
           'email' => 'julestd@gmail.com',
           'password' => 'julesthomas'  
        ];

        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(201);

    }

    public function test_login()
    {
        $data = [
           'email' => 'jules@gmail.com',
           'password' => 'julesthomas'  
        ];

        $response = $this->postJson('/api/login', $data);

        $response->assertStatus(200);

    }
}
