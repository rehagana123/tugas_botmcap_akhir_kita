<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Models\Pinjam;

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

   Route::get('/laporan//pdf', 'LaporanController@transaksiPdf');
//----------------------------------------------------//



Route::middleware('dashboardAuth')->group(function () {
    Route::get('/', [PerpusController::class, 'index']);

    /* Buku */
    Route::get('/data/create', [DataController::class, 'add']);
    Route::post('/data', [DataController::class, 'create']);
    Route::get('/data', [DataController::class, 'read']);
    Route::get('/data/{data_id}', [DataController::class, 'show']);
    Route::get('/data/{data_id}/edit', [DataController::class, 'edit']);
    Route::put('/data/{data_id}', [DataController::class, 'update']);
    Route::delete('data/{data_id}', [DataController::class, 'delete'])->name('buku.delete');

    /* Category */
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'add']);
    Route::get('/category/{id}', [CategoryController::class, 'edit']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    /* Profile */
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::patch('/profile', [ProfileController::class, 'update']);

    /* Pinjam */
    Route::get('/pinjam', [PinjamController::class, 'index']);
    Route::post('/pinjam/{id}', [PinjamController::class, 'add']);
    Route::delete('/pinjam/{id}', [PinjamController::class, 'kembali']);

    /* Download Laporan Pinjam Buku */
    Route::get('/laporan/pdf', [LaporanController::class, 'transaksiPdf']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

