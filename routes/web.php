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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/home', 'DashboardController@index')->name('home');

    //Pemilih
    Route::get('/pemilih', 'PemilihController@index')->name('pemilih');
    Route::get('/pemilih/tambah', 'PemilihController@tambah')->name('pemilih.tambah');
    Route::get('/pemilih/hapus', 'PemilihController@hapus')->name('pemilih.hapus');
    Route::post('/pemilih/simpan', 'PemilihController@simpan')->name('pemilih.simpan');

    //Kandidat
    Route::get('/kandidat', 'KandidatController@index')->name('kandidat');
    Route::get('/kandidat/tambah', 'KandidatController@tambah')->name('kandidat.tambah');
    Route::get('/kandidat/edit/{id}', 'KandidatController@edit')->name('kandidat.edit');
    Route::get('/kandidat/hapus/{id}', 'KandidatController@hapus')->name('kandidat.hapus');
    Route::post('/kandidat/simpan', 'KandidatController@simpan')->name('kandidat.simpan');
    Route::post('/kandidat/ubah/{id}', 'KandidatController@ubah')->name('kandidat.ubah');

    //Hasil
    Route::get('/hasil', 'HasilController@index')->name('hasil');
    Route::get('/hasil/ajax', 'HasilController@ajaxGetHasil')->name('hasil.ajax');
    Route::get('/hasil/ajax/akun', 'HasilController@ajaxGetAllAkun')->name('hasil.ajax.akun');
    Route::get('/hasil/ajax/akunsudahvoting', 'HasilController@ajaxGetAkunSudahVoting')->name('hasil.ajax.akunsudahvoting');
    Route::get('/hasil/ajax/akunbelumvoting', 'HasilController@ajaxGetAkunBelumVoting')->name('hasil.ajax.akunbelumvoting');
});
