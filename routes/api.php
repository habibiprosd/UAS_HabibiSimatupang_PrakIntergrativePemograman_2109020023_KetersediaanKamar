<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/rooms', [RoomController::class, 'index']);
Route::post('/patients/checkin,', [PatientController::class, 'checkin']);
Route::post('/patients/checkout', [PatientController::class, 'checkout']);