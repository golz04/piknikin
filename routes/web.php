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

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/rental', [App\Http\Controllers\Frontend\RentalController::class, 'index']);
Route::get('/tour-packages', [App\Http\Controllers\Frontend\TourPackageController::class, 'index']);
Route::get('/tour-packages/request', [App\Http\Controllers\Frontend\TourPackageController::class, 'request']);
Route::get('/promo', [App\Http\Controllers\Frontend\PromoController::class, 'index']);
Route::get('/article', [App\Http\Controllers\Frontend\ArticleController::class, 'index']);
Route::get('/about-us', [App\Http\Controllers\Frontend\AboutController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');