<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\GuruController;
use App\Http\Controllers\admin\JurusanController;
use App\Http\Controllers\auth\AuthController;

use App\Http\Controllers\admin\TargetPembelajaranController as LK1;
use App\Http\Controllers\admin\StrategiPembelajaranController as LK2;
use App\Http\Controllers\admin\IndikatorKetercapaianController as LK3;
use App\Http\Controllers\admin\Kompetensi_dasarController;
use App\Http\Controllers\admin\MateriBahanAjarController AS LK4;
use App\Http\Controllers\admin\RencanaPelaksanaanPembelajaranController as RPP;

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
    return view('layout.master');
});

// Route::get('/',[AuthController::class,'login'])->name('login');
// Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('guru', GuruController::class)->parameters(['guru' => 'Guru']);
// admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Route::resource('guru', GuruController::class)->parameters(['guru' => 'Guru']);
    Route::resource('jurusan', JurusanController::class)->parameters(['jurusan' => 'Jurusan']);
});

// guru
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('kompetensi_dasar', Kompetensi_dasarController::class);
    Route::resource('target_pembelajaran', LK1::class);
    Route::resource('strategi_pembelajaran', LK2::class);
    Route::resource('indikator_ketercapaian', LK3::class);
    Route::resource('materi_bahan_ajar', LK4::class);
    Route::resource('rpp', RPP::class);
});
