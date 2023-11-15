<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'landingPage'])->name('landingPage');
Route::get('/load-more', [App\Http\Controllers\HomeController::class, 'loadmore'])->name('loadmore');


Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::get('/account', [App\Http\Controllers\DashboardController::class, 'account'])->name('account');
Route::get('/product', [App\Http\Controllers\DashboardController::class, 'product'])->name('product');
Route::post('/user/active/{id}', [App\Http\Controllers\DashboardController::class, 'updateUser'])->name('updateUser');
