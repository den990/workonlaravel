<?php

use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DebugMiddleware;

Route::apiResource('guests', GuestController::class)->middleware(DebugMiddleware::class);
