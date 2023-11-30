<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminBukuController;
use App\Http\Controllers\AdminSeriesController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('user.dashboard');
    } elseif (Auth::guard('admin')->check()) {
        return redirect()->route('admin.dashboard');
    } else {
        return view('welcome');
    }
})->name('welcome');

Route::prefix('user')->group(function(){
    Route::get('/login',[UserController::class, 'Index'])->name('formlogin_user')->middleware('guest');
    Route::post('/login/proses',[UserController::class, 'Login'])->name('user.login')->middleware('guest');
    Route::get('/dashboard',[UserController::class, 'Dashboard'])->name('user.dashboard')->middleware('auth');
    Route::get('/logout',[UserController::class, 'Logout'])->name('user.logout')->middleware('auth');
    Route::get('/register',[UserController::class, 'Register'])->name('user.register')->middleware('guest');
    Route::post('/register/proses',[UserController::class, 'RegisterCreate'])->name('user.register.create')->middleware('guest');
    Route::get('/profil', [UserController::class, 'Profile'])->name('user.profile')->middleware('auth');

    // Buku
    Route::resource('buku', BukuController::class);
});

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'Login'])->name('formlogin_admin')->middleware('guest');
    Route::post('/login/proses', [AdminController::class, 'LoginProses'])->name('admin.login')->middleware('guest');
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout')->middleware('admin');

    // crud kategori
    Route::resource('kategori', AdminKategoriController::class);

    // crud buku
    Route::resource('bukuadmin', AdminBukuController::class);

    // crud series
    Route::resource('series', AdminSeriesController::class);
});

