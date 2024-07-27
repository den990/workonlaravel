<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_create_transaction()
    {
        $employee = Employee::factory()->create();

        $response = $this->postJson('/api/transactions', [
            'employee_id' => $employee->id,
            'hours' => 8,
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'employee_id', 'hours', 'is_paid', 'created_at', 'updated_at']);
    }

    public function test_pending_salaries()
    {
        $employee1 = Employee::factory()->create();
        $employee2 = Employee::factory()->create();
        Transaction::factory()->create(['employee_id' => $employee1->id, 'hours' => 8, 'is_paid' => false]);
        Transaction::factory()->create(['employee_id' => $employee2->id, 'hours' => 10, 'is_paid' => false]);

        $response = $this->getJson('/api/salaries');

        $response->assertStatus(200)
            ->assertJson([
                ['employee_id' => $employee1->id, 'pending_salary' => 160],
                ['employee_id' => $employee2->id, 'pending_salary' => 200]
            ]);
    }

    public function test_pay_salaries()
    {
        $employee = Employee::factory()->create();
        Transaction::factory()->create(['employee_id' => $employee->id, 'hours' => 8, 'is_paid' => false]);

        $this->postJson('/api/salaries/pay')->assertStatus(200);

        $this->assertDatabaseHas('transactions', ['employee_id' => $employee->id, 'hours' => 8, 'is_paid' => true]);
    }

    public function test_bad_create_transaction_with_hours()
    {
        $employee = Employee::factory()->create();

        $response = $this->postJson('/api/transactions', [
            'employee_id' => $employee->id,
            'hours' => 25,
        ]);

        $response->assertStatus(422)
            ->assertJsonFragment(['status' => 'error', ]);
    }

    public function test_bad_create_transaction_with_employee_id()
    {
        $employee = Employee::factory()->create();

        $response = $this->postJson('/api/transactions', [
            'employee_id' => 500,
            'hours' => 25,
        ]);

        $response->assertStatus(422)
            ->assertJsonFragment(['status' => 'error', ]);
    }
}
