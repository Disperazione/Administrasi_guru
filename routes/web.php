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
use Illuminate\Support\Facades\App;

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


Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('guest'); // middleware guest buat trigger redirect if autenticate
Route::post('/PostLogin', [AuthController::class, 'PostLogin'])->name('api.login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
note
kalau belom bisa login taro route resource nya di luar
cara ngeliat route di resource make php artisan route:list
*/


// all role

Route::prefix('admin')->name('admin.')->middleware(['auth', 'roles:admin,guru'])->group(function () {
    Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('dashboard');
    Route::get('/lang/{language}',[ViewController::class,'SetLocale'])->name('locale'); // untuk mengubah locale
});

// admin
Route::prefix('admin')->name('admin.')->middleware(['auth','roles:admin'])->group(function () {
    Route::resource('guru', GuruController::class)->parameters(['guru' => 'Guru']);
    Route::resource('jurusan', JurusanController::class)->parameters(['jurusan' => 'Jurusan']);

    //option valitade
    Route::get('/guru/validdate/nik/{name}', [GuruController::class, 'validated_nik']);
    Route::get('/guru/validdate/email/{email}', [GuruController::class, 'validated_email']);
    Route::get('/guru/validdate/nik/{id}/s/{name}/edit', [GuruController::class, 'validated_nik_edit']);
    Route::get('/guru/validdate/email/{id}/s/{email}/edit', [GuruController::class, 'validated_email_edit']);
});

// guru
Route::prefix('admin')->name('admin.')->middleware(['auth','roles:guru'])->group(function () {
    Route::resource('kompetensi_dasar', Kompetensi_dasarController::class);

    Route::resource('Lembar-kerja-1', LK1::class);
    Route::resource('Lembar-kerja-2', LK2::class);
    Route::resource('Lembar-kerja-3', LK3::class);
    Route::resource('Lembar-kerja-4', LK4::class);
    Route::resource('RPP', RPP::class);

    // route for option
    Route::get('/option/jurusan/{id}', [LK1::class, 'option_jurusan']);
    Route::get('/option/mapel/{id}', [LK1::class, 'option_mapel']);
    Route::get('/option/mapel/{id}/edit', [LK1::class, 'option_mapel_edit']);

    // Route::get('/lk4/option/guru/{id}', [LK4::class, 'option_guru']);
    // Route::get('/lk4/option/mapel/{id}', [LK4::class, 'option_mapel']);
    // Route::get('/lk4/option/bidang_studi/{id}', [LK4::class, 'option_bidang']);

    Route::get('/lk4/option/jurusan/{id}', [LK4::class, 'option_jurusan']);
    Route::get('/lk4/option/mapel/{id}', [LK4::class, 'option_mapel']);
    Route::get('/lk4/option/mapel/{id}/edit', [LK4::class, 'option_mapel_edit']);

    // route for pdf here
    Route::get('/lk_1/{id}/pdf',[PDFController::class,'LK_1'])->name('pdf.lk_1');
    Route::get('/lk_2/{id}/pdf', [PDFController::class, 'LK_2'])->name('pdf.lk_2');
    Route::get('/lk_3/{id}/pdf', [PDFController::class, 'LK_3'])->name('pdf.lk_3');
    Route::get('/lk_4/{id}/pdf', [PDFController::class, 'LK_4'])->name('pdf.lk_4');
    Route::get('/rpp/{id}/pdf', [PDFController::class, 'rpp'])->name('pdf.rpp');

    // export route
    Route::get('/excel/guru',[GuruController::class,'export'])->name('export.guru');
    Route::get('/excel/jurusan', [JurusanController::class, 'export'])->name('export.jurusan');


});
