<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonversiController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\PengepulController;
use App\Http\Controllers\SampahCacahController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SampahPlastikController;
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
Route::middleware(['auth:sanctum', 'verified'])->post('/user/change/{id}', [UserController::class, 'changePassword'])->name('user.change-password');
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

// Sampah Plastik
Route::middleware(['auth:sanctum', 'verified'])->resource('sampah-plastik', SampahPlastikController::class);
// END Sampah Plastik

// Sampah Cacah
Route::middleware(['auth:sanctum', 'verified'])->resource('sampah-cacah', SampahCacahController::class);
// END Sampah Cacah

// Konversi
Route::middleware(['auth:sanctum', 'verified'])->resource('konversi', KonversiController::class);
// END Konversi

// Logout Action
Route::get('/logoutaction', [UserController::class, 'logoutAction'])->name('logout.action');