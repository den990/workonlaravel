<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Employee;
use App\Models\Transaction;

class TransactionController extends Controller
{
    private $hourlyRate = 20;

    public function store(StoreTransactionRequest $request)
    {

        $transaction = Transaction::create($request->validated());
        return response()->json($transaction, 201);
    }

    public function pendingSalaries()
    {
        $salaries = Employee::with('transactions')->get()->map(function ($employee) {
            $total = $employee->transactions->where('is_paid', false)->sum('hours') * $this->hourlyRate;
            return [
                'employee_id' => $employee->id,
                'pending_salary' => $total,
            ];
        });

        return response()->json($salaries);
    }

    public function paySalaries()
    {
        Transaction::where('is_paid', false)->update(['is_paid' => true]);

        return response()->json(['status' => 'Salaries paid']);
    }
}
