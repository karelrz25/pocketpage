<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::prefix('user')->group(function(){
    Route::get('/login',[UserController::class, 'Index'])->name('formlogin_user');
    Route::post('/login/proses',[UserController::class, 'Login'])->name('user.login');
    Route::get('/dashboard',[UserController::class, 'Dashboard'])->name('user.dashboard')->middleware('auth');
    Route::get('/logout',[UserController::class, 'Logout'])->name('user.logout')->middleware('auth');
    Route::get('/register',[UserController::class, 'Register'])->name('user.register')->middleware('guest');
    Route::post('/register/proses',[UserController::class, 'RegisterCreate'])->name('user.register.create');
});