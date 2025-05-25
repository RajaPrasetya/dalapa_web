<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TiketGangguanController;
use App\Http\Controllers\WorkOrderController;
use Illuminate\Support\Facades\Route;

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

//Authentication routes
Route::get('/', [AuthController::class, 'index'])->name('home')->middleware('auth');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes with prefix
Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function() {
    Route::resource('tiket-gangguan', TiketGangguanController::class);
    Route::get('material/export', [MaterialController::class, 'export'])->name('material.export');
    Route::resource('material', MaterialController::class);
    Route::resource('workorder', WorkOrderController::class);
});

// Teknisi routes with prefix
Route::prefix('teknisi')->name('teknisi.')->middleware(['auth','role:teknisi'])->group(function() {
    Route::resource('tiket-gangguan', TiketGangguanController::class)
        ->only(['index', 'update']);
    Route::resource('workorder', WorkOrderController::class)
        ->only(['index', 'update']);
    Route::resource('material', MaterialController::class)
        ->only(['index']);
});


