<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//auth
Route::get('/l051n', [AuthController::class, 'login'])->middleware(['guest'])->name('login');
Route::get('out', [AuthController::class, 'out']);
Route::post('login', [AuthController::class, 'Auth']);

Route::get('dashboard', [DashboardController::class, 'dashboard']);
Route::get('certificate', [CertificateController::class, 'index']);
Route::get('certificate/create', [CertificateController::class, 'create']);
Route::post('certificate/send', [CertificateController::class, 'send']);
Route::get('certificate/getUpdate/{id}', [CertificateController::class, 'getUpdate']);
Route::post('certificate/sendUpdate/{id}', [CertificateController::class, 'sendUpdate']);
Route::post('certificate/changeStatus/{id}', [CertificateController::class, 'changeStatus']);
Route::get('certificate/qrcode/{number}', [CertificateController::class, 'generateQrCode'])->name('generateQrcode');
Route::post('certificate/delete/{id}', [CertificateController::class, 'delete']);
Route::get('client/create', [ClientController::class, 'create']);
Route::get('client', [ClientController::class, 'index']);
