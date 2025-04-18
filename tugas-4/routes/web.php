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


use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PlayStationController;
use App\Http\Controllers\TransaksiController;

Route::resource('pelanggan', PelangganController::class);
Route::resource('playstation', PlayStationController::class);
Route::resource('transaksi', TransaksiController::class);