<?php

use App\Http\Controllers\BarangayLGUController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProccessController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\BusinessPermitController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('residents', ResidentController::class);
    Route::resource('business_permits', BusinessPermitController::class)->except('show');
    Route::resource('baranagay_l_g_u_s', BarangayLGUController::class)->except('show');
    Route::get('/autosuggest', [ProccessController::class, 'index'])->name('autosuggest');
});
