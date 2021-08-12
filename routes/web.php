<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\GuruController;
use App\Http\Controllers\admin\JurusanController;
use App\Http\Controllers\admin\Kompetensi_dasarController;
use App\Http\Controllers\auth\AuthController;

use App\Http\Controllers\admin\lembar_kerja\LembarKerjaSatu as LK1;
use App\Http\Controllers\admin\lembar_kerja\LembarKerjaDua as LK2;
use App\Http\Controllers\admin\lembar_kerja\LembarKerjaTiga as LK3;
use App\Http\Controllers\admin\lembar_kerja\LembarKerjaEmpat as LK4;
use App\Http\Controllers\admin\lembar_kerja\RPPController as RPP;
use App\Http\Controllers\PDF\PDFController;
use App\Http\Controllers\ViewController;

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


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/PostLogin', [AuthController::class, 'PostLogin'])->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
note
kalau belom bisa login taro route resource nya di luar
cara ngeliat route di resource make php artisan route:list
*/

// admin
Route::prefix('admin')->name('admin.')->middleware(['auth','roles:admin'])->group(function () {
    Route::resource('guru', GuruController::class)->parameters(['guru' => 'Guru']);
    Route::resource('jurusan', JurusanController::class)->parameters(['jurusan' => 'Jurusan']);
});

// guru
Route::prefix('admin')->name('admin.')->middleware(['auth','roles:guru,admin'])->group(function () {
    Route::get('/dashboard', [ViewController::class,'dashboard'])->name('dashboard');
    Route::resource('kompetensi_dasar', Kompetensi_dasarController::class);
    Route::resource('Lembar-kerja-1', LK1::class);
    Route::resource('Lembar-kerja-2', LK2::class);
    Route::resource('Lembar-kerja-3', LK3::class);
    Route::resource('Lembar-kerja-4', LK4::class);
    Route::resource('RPP', RPP::class);

    // route for pdf here
    Route::get('/lk_1/{id}/pdf',[PDFController::class,'LK_1'])->name('pdf.lk_1');
    Route::get('/lk_2/{id}/pdf', [PDFController::class, 'LK_2'])->name('pdf.lk_2');
    Route::get('/lk_3/{id}/pdf', [PDFController::class, 'LK_3'])->name('pdf.lk_3');
    Route::get('/lk_4/{id}/pdf', [PDFController::class, 'LK_4'])->name('pdf.lk_4');
    Route::get('/rpp/{id}/pdf', [PDFController::class, 'rpp'])->name('pdf.rpp');

    // export route
    Route::get('/guru/excel',[GuruController::class,'export'])->name('export.guru');
    Route::get('/jurusan/excel', [JurusanController::class, 'export'])->name('export.jurusan');

});
