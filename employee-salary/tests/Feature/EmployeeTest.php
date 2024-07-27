<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_create_employee()
    {
        $response = $this->postJson('/api/employees', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'email', 'created_at', 'updated_at']);
    }

    public function test_bad_create_employee_with_email()
    {
        $response = $this->postJson('/api/employees', [
            'email' => 'testexample.com',
            'password' => 'password',
        ]);

        $response->assertStatus(422)
            ->assertJsonFragment(['status' => 'error', ]);
    }

    public function test_bad_create_employee_with_password()
    {
        $response = $this->postJson('/api/employees', [
            'email' => 'test@example.com',
            'password' => 'pas',
        ]);

        $response->assertStatus(422)
            ->assertJsonFragment(['status' => 'error', ]);
    }
}
