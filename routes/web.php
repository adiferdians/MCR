<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificationBodyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\VerificationController;

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
Route::get('/l051n', [AuthController::class, 'login'])->name('login');
Route::get('out', [AuthController::class, 'out']);
Route::post('login', [AuthController::class, 'auth']);

Route::middleware(['auth'])->group(function () {
    //Dashboard Page
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //certificate Page
    Route::get('certificate', [CertificateController::class, 'index']);
    Route::get('certificate/create', [CertificateController::class, 'create']);
    Route::post('certificate/send', [CertificateController::class, 'send']);
    Route::get('certificate/getUpdate/{id}', [CertificateController::class, 'getUpdate']);
    Route::post('certificate/sendUpdate/{id}', [CertificateController::class, 'sendUpdate']);
    Route::post('certificate/changeStatus/{id}', [CertificateController::class, 'changeStatus']);
    Route::get('certificate/qrcode/{number}', [CertificateController::class, 'generateQrCode'])->name('generateQrcode');
    Route::post('certificate/delete/{id}', [CertificateController::class, 'delete']);
    //client page
    Route::get('client', [ClientController::class, 'index']);
    Route::get('client/create', [ClientController::class, 'create']);
    Route::post('client/send', [ClientController::class, 'send']);
    Route::get('client/detail/{id}', [ClientController::class, 'detailClient']);
    Route::get('client/getUpdate/{id}', [ClientController::class, 'getUpdate']);
    Route::post('client/sendUpdate/{id}', [ClientController::class, 'sendUpdate']);
    Route::post('client/changeStatus/{id}', [ClientController::class, 'changeStatus']);
    Route::post('client/changeConsultantStatus/{id}', [ClientController::class, 'changeConsultantStatus']);
    Route::post('client/delete/{id}', [ClientController::class, 'deleteClient']);

    //Master Data Page
    Route::get('broker', [BrokerController::class, 'index']);
    Route::get('broker/create', [BrokerController::class, 'create']);
    Route::post('broker/send', [BrokerController::class, 'send']);
    Route::get('broker/getUpdate/{id}', [BrokerController::class, 'getUpdate']);
    Route::post('broker/sendUpdate/{id}', [BrokerController::class, 'send']);
    Route::post('broker/changeStatus/{id}', [BrokerController::class, 'changeStatus']);
    Route::post('broker/delete/{id}', [BrokerController::class, 'deleteBroker']);

    Route::get('certification-body', [CertificationBodyController::class, 'index']);
    Route::get('standard', [StandardController::class, 'index']);

    Route::get('role', [RoleController::class, 'index']);
    Route::get('role/create', [RoleController::class, 'create']);
    Route::post('role/send', [RoleController::class, 'send']);
});


Route::get('/', [VerificationController::class, 'verificationIndex'])->name('verification');
Route::get('/{number}', [verificationController::class, 'detilCertificate']);
Route::post('/', [verificationController::class, 'find']);