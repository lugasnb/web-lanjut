<?php

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

use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;

// Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'],function () {
//     Route::resource('dashboard', PageController::class);
// });



Route::get('/login', [LoginController::class, 'indexLogin'])->name('auth.login');
Route::post('/login_proses', [LoginController::class, 'proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'Register'])->name('auth.register');
Route::post('/register', [LoginController::class, 'storeRegister'])->name('auth.register');

Route::resource('dashboard', PageController::class);
Route::resource('customers', CustomerController::class);
Route::resource('karyawans', KaryawanController::class);

Route::middleware(['auth' , 'isLevel:admin'])->group(function () { 
    Route::resource('dashboard', PageController::class); 
    Route::resource('customers', CustomerController::class); 
    Route::resource('karyawans', KaryawanController::class); 
    // Route::resource('orders', OrderController::class); 
});

Route::middleware(['auth' , 'isLevel:admin,customer'])->group(function () { 
Route::resource('customers', CustomerController::class)->except(['show','edit', 'destroy']); 
Route::resource('karyawans', KaryawanController::class); 
Route::resource('dashboard', PageController::class); 
});
