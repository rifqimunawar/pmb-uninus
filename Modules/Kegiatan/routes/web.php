<?php

use Illuminate\Support\Facades\Route;
use Modules\Kegiatan\Http\Controllers\KegiatanController;

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

Route::prefix('kegiatan')->middleware('auth')->group(function () {

  Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan.index');
  Route::get('/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
  Route::get('/export', [KegiatanController::class, 'export'])->name('kegiatan.export');
  Route::get('/pdf', [KegiatanController::class, 'pdf'])->name('kegiatan.pdf');
  Route::get('/print', [KegiatanController::class, 'print'])->name('kegiatan.print');
  Route::get('/{id}', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
  Route::get('/{id}/view', [KegiatanController::class, 'view'])->name('kegiatan.view');
  Route::post('/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
  Route::delete('/{id}/del', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

});
;
