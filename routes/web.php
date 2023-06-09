<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JeniskulitController;
use App\Http\Controllers\GejalakulitController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DataDiagnosaController;
use App\Http\Controllers\HistoryController;

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

Route::group(["middleware" => ["can:user"]], function() {
    Route::resource('diagnosa', DiagnosaController::class);
    Route::get('/hasil', function () {
        return view('/diagnosa/hasil');
    });
});

Route::get('/', function () {   
    return view('/user/landingpage/landing');
});

Route::get('/informasi-JenisKulit', function () {
    return view('/user/informasi/jeniskulit');
});

Route::get('informasi-Treatment', [TreatmentController::class, 'treatment']);

Route::get('/tentang', function () {
    return view('/user/tentang/index');
});

Route::get('/contact', function () {
    return view('/user/kontak/index');
});


// Admin Routes
Route::group(["middleware" => ["hakakses"]], function() {
    Route::group(["middleware" => ["can:admin"]], function() {
        Route::get('admin', [AdminController::class, 'dashboard']);
        Route::resource('jeniskulit', JeniskulitController::class);
        Route::resource('gejalakulit', GejalakulitController::class);
        Route::resource('treatment', TreatmentController::class);
        Route::resource('data-pengguna', PenggunaController::class);
        Route::resource('data-diagnosa', DataDiagnosaController::class);
    });
});

Route::group(["middleware" => ["guest"]], function() {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
});
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
