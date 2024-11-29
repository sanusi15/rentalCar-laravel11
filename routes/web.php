<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/signUp', [AuthController::class, 'signUp']);
Route::post('/signIn', [AuthController::class, 'signIn']);
Route::middleware([Authenticate::class])->group(function () {
    // start dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // end dashboard
    Route::get('/booking', [DashboardController::class, 'booking'])->name('booking');

    // start cars
    Route::get('/cars', [CarController::class, 'index'])->name('cars');
    Route::get('/add_cars', [CarController::class, 'create'])->name('add_cars');
    Route::post('/cars', [CarController::class, 'store'])->name('save_cars');
    Route::get('/show/{car:cars_id}', [CarController::class, 'show'])->name('show_cars');
    Route::get('/edit/{car:cars_id}', [CarController::class, 'edit'])->name('edit_cars');
    Route::put('/update/{car:cars_id}', [CarController::class, 'update'])->name('update_cars');
    Route::post('/delete/{car:cars_id}', [CarController::class, 'destroy'])->name('delete_cars');
    // end cars
    
    // start type cars
    Route::get('/cars_type', [CarController::class, 'type'])->name('cars_type');
    Route::post('/add_type', [CarController::class, 'save_type'])->name('add_type');
    Route::post('/update_type', [CarController::class, 'update_type'])->name('update_type');
    Route::post('/delete_type/{car:cars_id}', [CarController::class, 'destroy_type'])->name('delete_type');
    // end type cars
    
    // start type cars
    Route::get('/cars_model', [CarController::class, 'model'])->name('cars_model');
    Route::post('/add_model', [CarController::class, 'save_model'])->name('add_model');
    Route::post('/update_model', [CarController::class, 'update_model'])->name('update_model');
    Route::post('/delete_model/{car:cars_id}', [CarController::class, 'destroy_model'])->name('delete_model');
    // end type cars

    Route::get('/report', [DashboardController::class, 'report'])->name('report');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
