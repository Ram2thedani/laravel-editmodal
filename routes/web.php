<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SeatsController;
use App\Http\Controllers\UserController;

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
    return view('login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // route user
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/tambah', [UserController::class, 'create']);
    Route::post('/user/simpan', [UserController::class, 'store']);
    Route::get('/user/edit/{id}', [UserController::class, 'show']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/hapus/{id}', [UserController::class, 'destroy']);

    // route seats
    Route::get('/seats', [SeatsController::class, 'index']);
    Route::get('/seats/tambah', [SeatsController::class, 'create']);
    Route::post('/seats/simpan', [SeatsController::class, 'store']);
    Route::get('/seats/edit/{id}', [SeatsController::class, 'show']);
    Route::post('/seats/update/{id}', [SeatsController::class, 'update']);
    Route::get('/seats/hapus/{id}', [SeatsController::class, 'destroy']);

    //route reservation
    Route::get('/reservation', [ReservationController::class, 'index']);
    Route::post('/checkout', [ReservationController::class, 'checkout'])->middleware('auth');
});
Route::post('/PostLogin', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
