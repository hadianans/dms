<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SockController;
use App\Http\Controllers\YarnController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FinishingController;
use App\Http\Controllers\ProductionController;
use App\Models\Order;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'authenticate']);

Route::middleware(['auth'])->group(function() {
    Route::get('/', function () {return view('dashboard');});

    Route::resource('sock', SockController::class);
    // Route::resource('yarn', YarnController::class);
    Route::resource('controller', Controller::class);
    Route::resource('color', ColorController::class);
    Route::resource('order', OrderController::class);
    Route::resource('employe', EmployeController::class);
    Route::resource('customer', CustomerController::class);
    // Route::resource('finishing', FinishingController::class);
    Route::resource('production', ProductionController::class);

    Route::get('/history', [OrderController::class, 'history']);
    Route::get('/dataorder', [OrderController::class, 'dataorder']);
    Route::post('/change-priority', [OrderController::class, 'changePriority'])->name('change.priority');
});
