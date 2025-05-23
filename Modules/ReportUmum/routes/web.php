<?php

use Illuminate\Support\Facades\Route;
use Modules\ReportUmum\Http\Controllers\ReportUmumController;

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



Route::prefix('report_umum')->middleware('auth')->group(function () {
  Route::get('/', [ReportUmumController::class, 'get_data'])->name('report_umum.index');
});
