<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\KonversiController;
use App\Http\Controllers\PemilahanController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengepulController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PenjadwalanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SampahCacahController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SampahPlastikController;
use App\Http\Controllers\TransaksiPembelianController;
use App\Http\Controllers\TransaksiPenjualanController;
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
Route::middleware(['auth:sanctum', 'verified'])->get('/sampah-plastik/delete/{id}', [SampahPlastikController::class, 'delete'])->name('sampah-plastik.delete');
// END Sampah Plastik

// Sampah Cacah
Route::middleware(['auth:sanctum', 'verified'])->resource('sampah-cacah', SampahCacahController::class);
// END Sampah Cacah

// Konversi
Route::middleware(['auth:sanctum', 'verified'])->resource('konversi', KonversiController::class);
// END Konversi

// Pemilahan
Route::middleware(['auth:sanctum', 'verified'])->resource('pemilahan', PemilahanController::class);
// END Pemilahan

// Penjadwalan
Route::middleware(['auth:sanctum', 'verified'])->resource('penjadwalan', PenjadwalanController::class);
// END Penjadwalan

// Pembelian
Route::middleware(['auth:sanctum', 'verified'])->resource('pembelian', PembelianController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('pembelian-transaction/{invoice?}', [PembelianController::class, 'pembelianTransaction'])->name('pembelian.transaction');

Route::middleware(['auth:sanctum', 'verified'])->get('/transaksi-pembelian/delete/{id}', [TransaksiPembelianController::class, 'delete'])->name('transaksi-pembelian.delete');
// END Pembelian

// Penjualan
Route::middleware(['auth:sanctum', 'verified'])->resource('penjualan', PenjualanController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('penjualan-transaction/{invoice?}', [PenjualanController::class, 'penjualanTransaction'])->name('penjualan.transaction');

Route::middleware(['auth:sanctum', 'verified'])->get('/transaksi-penjualan/delete/{id}', [TransaksiPenjualanController::class, 'delete'])->name('transaksi-penjualan.delete');
// END Penjualan

// Pengiriman
Route::middleware(['auth:sanctum', 'verified'])->resource('pengiriman', PengirimanController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('pengiriman-done/{id?}', [PengirimanController::class, 'pengirimanDone'])->name('pengiriman.done');
// END Pengiriman

// Logout Action
Route::get('/logoutaction', [UserController::class, 'logoutAction'])->name('logout.action');

// Laporan
Route::middleware(['auth:sanctum', 'verified'])->get('/report/{param}', [ReportController::class, 'report'])->name('report');

// Print PDF
Route::middleware(['auth:sanctum', 'verified'])->get('/print-invoice/{param}/{invoice}', [PrintController::class, 'invoice'])->name('print.invoice');

// Export Excel
Route::middleware(['auth:sanctum', 'verified'])->get('/export/{param}', [ExportController::class, 'export'])->name('export');