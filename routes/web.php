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

// Start FE
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/rental', [App\Http\Controllers\Frontend\RentalController::class, 'index']);
Route::get('/rental/detail', [App\Http\Controllers\Frontend\RentalController::class, 'detail']);
Route::get('/tour-packages', [App\Http\Controllers\Frontend\TourPackageController::class, 'index']);
Route::get('/tour-packages/detail', [App\Http\Controllers\Frontend\TourPackageController::class, 'detail']);
Route::get('/tour-packages/request', [App\Http\Controllers\Frontend\TourPackageController::class, 'request']);
Route::get('/promo', [App\Http\Controllers\Frontend\PromoController::class, 'index']);
Route::get('/promo/detail', [App\Http\Controllers\Frontend\PromoController::class, 'detail']);
Route::get('/article', [App\Http\Controllers\Frontend\ArticleController::class, 'index']);
Route::get('/article/detail', [App\Http\Controllers\Frontend\ArticleController::class, 'detail']);
Route::get('/about-us', [App\Http\Controllers\Frontend\AboutController::class, 'index']);

// Start BE
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index']);

    // destination
    Route::get('/destination', [App\Http\Controllers\Backend\DestinationController::class, 'index']);
    Route::post('/destination/store', [App\Http\Controllers\Backend\DestinationController::class, 'store']);
    Route::get('/destination/{destination}/edit', [App\Http\Controllers\Backend\DestinationController::class, 'edit']);
    Route::patch('/destination/update/{destination}', [App\Http\Controllers\Backend\DestinationController::class, 'update']);
    Route::delete('/destination/{destination}/drop', [App\Http\Controllers\Backend\DestinationController::class, 'drop']);

    // account
    Route::get('/account', [App\Http\Controllers\Backend\AccountController::class, 'index']);
    Route::get('/account/add', [App\Http\Controllers\Backend\AccountController::class, 'add']);
    Route::post('/account/store', [App\Http\Controllers\Backend\AccountController::class, 'store']);
    Route::get('/account/{user}/detail', [App\Http\Controllers\Backend\AccountController::class, 'detail']);
    Route::patch('/account/{user}/reset', [App\Http\Controllers\Backend\AccountController::class, 'reset']);
    Route::delete('/account/{user}/drop', [App\Http\Controllers\Backend\AccountController::class, 'drop']);
});

Auth::routes();
Route::get('/register', function(){
    return redirect('/login');
});