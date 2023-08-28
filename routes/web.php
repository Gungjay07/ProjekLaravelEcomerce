<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
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


Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
    // Route::post('profile/{id}', 'profileAksi')->middleware('auth')->name('profile');
    Route::get('profile', 'profile')->middleware('auth')->name('profileAja');
});



Route::middleware(['auth'])->group(function () {

    // Route::get('dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [BarangController::class, 'dashboard1'])->name('dashboard');

    Route::controller(BarangController::class)->prefix('barang')->group(function () {

        Route::get('', 'index')->name('barang');
        
        Route::get('add', 'add')->name('barang.add');
        Route::post('add', 'save')->name('barang.add.save');
        Route::post('edit/{id}', 'update')->name('barang.add.update');
        Route::post('edit', 'edit')->name('barang.edit');
        Route::get('edit/{id}', 'edit')->name('barangEdit');
        Route::post('delete', 'delete')->name('barang.delete');

        // Route::get('dashboard', 'dashboard1')->name('dashboard1');
        # /barang/dashboard
        # /barang => Route::get('', 'index')->name('barang');
        # cek /barang ada atau ga
        # > ada
        # Route::get('', 'dashboard1')->name('dashboard1');

        # /barang pengennya Route::get('', 'index')->name('barang');
        # /barang ke rewrite ke Route::get('', 'dashboard1')->name('dashboard1');

    });

    Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
        Route::get('', 'index')->name('kategori');
        Route::get('tambah', 'add')->name('kategori.add');
        Route::post('tambah', 'save')->name('kategori.add.save');
        Route::get('edit/{id}', 'edit')->name('kategori.edit');
        Route::post('edit/{id}', 'update')->name('kategori.save.update');
        Route::get('delete/{id}', 'delete')->name('kategori.delete');
    });
});
