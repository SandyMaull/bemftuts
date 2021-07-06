<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'PagesController@index');
Route::get('/bemftuts', 'PagesController@bemindex');
Route::get('/Galeri', 'PagesController@galeripagesindex');
Route::get('/BPH', 'PagesController@bphpagesindex');
Route::get('/Internal', 'PagesController@internalpagesindex');
Route::get('/Relasi', 'PagesController@relasipagesindex');
Route::get('/Sospol', 'PagesController@sospolpagesindex');
Route::get('/Medinfo', 'PagesController@medinfopagesindex');
Route::get('/Ekraf', 'PagesController@ekrafpagesindex');
Route::post('/KotakAspirasi', 'PagesController@aspirasitambah');
Route::get('/Registrasi', 'PagesController@regispengurusindex');
Route::post('/Registrasi-Accept', 'PagesController@regispengurusshow');
Route::post('/Registrasi-Store', 'PagesController@regispengurusstore');
Route::get('/Form/{id}', 'FormController@public');
Route::post('/Form/{id}/input', 'FormController@publicinput');

Route::get('/login','AuthController@login')->middleware('guest')
    ->name('login');
Route::post('/postlogin','AuthController@postlogin')
    ->name('login.post');
Route::get('/logout','AuthController@logout')
    ->name('login.out');


Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['checkRole:superadmin,powerfuladmin']], function(){
        Route::post('/admin/create','AdminController@create')
            ->name('admin.create');
        Route::put('/admin/update','AdminController@update')
            ->name('admin.update');
        Route::post('/admin/destroy','AdminController@destroy')
            ->name('admin.destroy');
        Route::post('/mahasiswa/create','MahasiswaController@create')
            ->name('mahasiswa.create');
        Route::put('/mahasiswa/update','MahasiswaController@update')
            ->name('mahasiswa.update');
        Route::post('/mahasiswa/destroy','MahasiswaController@destroy')
            ->name('mahasiswa.destroy');
    });
    Route::get('/dashboard','AdminController@index')
    ->name('admin.dashboard');
    Route::get('/admin','AdminController@pengurus')
    ->name('admin.pengurus');
    Route::get('/mahasiswa','MahasiswaController@index')
    ->name('mahasiswa.index');


    Route::get('/admin/Internal/KotakAspirasi','AdminController@aspirasiindex');


    Route::group(['middleware' => ['checkBidang']], function(){
        Route::get('/admin/{bidang}', 'AdminController@bidangindex');
        Route::post('/admin/{bidang}/Tambah','AdminController@bidangtambah');
        Route::get('/admin/{bidang}/{id}/show','AdminController@bidangshow');
        Route::put('/admin/{bidang}/{id}/edit','AdminController@bidangedit')->middleware('checkBidangEdit');
        // Route::post('/Tambahform/Form-Bemftuts-{form}', 'FormController@create')->middleware('checkBidangEdit');
        Route::post('/admin/{bidang}/Delete','AdminController@bidangdelete')->middleware('checkBidangEdit');

        Route::get('/admin/{bidang}/Form', 'FormController@index');
        Route::get('/admin/{bidang}/Form/{id}/show', 'FormController@show');
        Route::post('/admin/{bidang}/Form/delete', 'FormController@destroy');
        Route::put('/admin/{bidang}/Form/{id}/edit', 'FormController@update');
        Route::get('/admin/{bidang}/Form/{id}/export', 'FormController@exportexcel');
        Route::get('/admin/{bidang}/Response-Form/{id}/show', 'FormController@responseshow');
        Route::post('/admin/{bidang}/Form/Tambah', 'FormController@createform');
        Route::post('/admin/{bidang}/Form/Publish', 'FormController@storeform');
    });
    
    
});
