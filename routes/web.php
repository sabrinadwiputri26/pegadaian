<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegadaianController;
use App\Http\Controllers\ResponseController;
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

Route::get('/login',[PegadaianController::class, 'login'])->name('login');
Route::post('auth',[PegadaianController::class, 'auth'])->name('auth');
Route::get('/',[PegadaianController::class, 'home']);
Route::get('/petugas',[PegadaianController::class, 'petugas'])->name('petugas');
Route::get('/create',[PegadaianController::class, 'create']);
Route::post('/kirim-data',[PegadaianController::class, 'store'])->name('kirim_data');
Route::get('/create',[PegadaianController::class, 'create']); 
Route::post('/store',[PegadaianController::class, 'store']);
Route::get('/dashboard',[PegadaianController::class, 'home'])->name('dashboard');

Route::middleware('isLogin','CekRole:petugas')->group(function(){
    Route::get('/data/petugas',[PegadaianController::class, 'petugas'])->name('data.petugas'); 
    Route::get('/response/edit/{pegadaian_id}',[ResponseController::class, 'edit'])->name('response.edit');
    Route::patch('/response/update/{pegadaian_id}',[ResponseController::class, 'update'])->name('response.update');  
});

Route::middleware('isLogin','CekRole:admin,petugas')->group(function(){
     Route::delete('/delete/{id}',[PegadaianController::class, 'destroy'])->name('destroy');
    Route::get('/logout',[PegadaianController::class, 'logout'])->name('logout');
});

Route::middleware('isLogin','CekRole:admin')->group(function(){
    Route::delete('/delete/{id}',[PegadaianController::class, 'destroy'])->name('destroy');
    Route::get('/data',[PegadaianController::class, 'data'])->name('data'); 
    Route::get('/export/pdf',[PegadaianController::class, 'exportPDF'])->name('export-PDF');
    Route::get('/created/export/pdf/{id}',[PegadaianController::class, 'createdPDF'])->name('created.PDF');
    Route::get('/export/excel',[PegadaianController::class, 'exportExcel'])->name('export-excel');

});