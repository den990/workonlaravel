<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TransactionController;

Route::post('/employees', [EmployeeController::class, 'store']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::get('/salaries', [TransactionController::class, 'pendingSalaries']);
Route::post('/salaries/pay', [TransactionController::class, 'paySalaries']);
