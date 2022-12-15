<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\PengepulController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// User
Route::middleware(['auth:sanctum', 'verified'])->resource('user', UserController::class);
// End User

// Supplier
Route::middleware(['auth:sanctum', 'verified'])->resource('supplier', SupplierController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
// END Supplier

// Pengepul
Route::middleware(['auth:sanctum', 'verified'])->resource('pengepul', PengepulController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/pengepul/delete/{id}', [PengepulController::class, 'delete'])->name('pengepul.delete');
// End Pengepul

// Mesin
Route::middleware(['auth:sanctum', 'verified'])->resource('mesin', MesinController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/mesin/delete/{id}', [MesinController::class, 'delete'])->name('mesin.delete');
// End Mesin