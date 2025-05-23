<?php

use Illuminate\Support\Facades\Route;
use Modules\Sinkronisasi\Http\Controllers\SinkronisasiController;

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

Route::prefix('sinkronisasi')->middleware('auth')->group(function () {
  Route::get('/', [SinkronisasiController::class, 'index'])->name('sinkronisasi.index');
  Route::get('/create', [SinkronisasiController::class, 'get_data'])->name('sinkronisasi.create');
});
