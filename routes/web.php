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
    // dashboard
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index']);

    // promo
    Route::get('/promo/list-promo', [App\Http\Controllers\Backend\PromoController::class, 'lpIndex']);
    Route::get('/promo/list-promo/add', [App\Http\Controllers\Backend\PromoController::class, 'lpAdd']);
    Route::post('/promo/list-promo/store', [App\Http\Controllers\Backend\PromoController::class, 'lpStore']);
    Route::get('/promo/list-promo/{promo}/edit', [App\Http\Controllers\Backend\PromoController::class, 'lpEdit']);
    Route::patch('/promo/list-promo/update/{promo}', [App\Http\Controllers\Backend\PromoController::class, 'lpUpdate']);
    Route::delete('/promo/list-promo/{promo}/drop', [App\Http\Controllers\Backend\PromoController::class, 'lpDrop']);


    // request-tour
    Route::get('/testimonial', [App\Http\Controllers\Backend\TestimonialController::class, 'index']);
    Route::get('/testimonial/add', [App\Http\Controllers\Backend\TestimonialController::class, 'add']);
    Route::post('/testimonial/store', [App\Http\Controllers\Backend\TestimonialController::class, 'store']);
    Route::get('/testimonial/{testimonial}/edit', [App\Http\Controllers\Backend\TestimonialController::class, 'edit']);
    Route::patch('/testimonial/update/{testimonial}', [App\Http\Controllers\Backend\TestimonialController::class, 'update']);
    Route::delete('/testimonial/{testimonial}/drop', [App\Http\Controllers\Backend\TestimonialController::class, 'drop']);

    // feedback
    Route::get('/feedback', [App\Http\Controllers\Backend\FeedbackController::class, 'index']);
    Route::post('/feedback/store', [App\Http\Controllers\Backend\FeedbackController::class, 'store']);
    Route::patch('/feedback/{feedback}/update', [App\Http\Controllers\Backend\FeedbackController::class, 'update']);
    Route::delete('/feedback/{feedback}/drop', [App\Http\Controllers\Backend\FeedbackController::class, 'drop']);
    Route::post('/feedback/update/all', [App\Http\Controllers\Backend\FeedbackController::class, 'all']);

    // request-tour
    Route::get('/request-tour', [App\Http\Controllers\Backend\RequestTourController::class, 'index']);
    Route::get('/request-tour/add', [App\Http\Controllers\Backend\RequestTourController::class, 'add']);
    Route::post('/request-tour/store', [App\Http\Controllers\Backend\RequestTourController::class, 'store']);
    Route::get('/request-tour/{requestTour}/detail', [App\Http\Controllers\Backend\RequestTourController::class, 'detail']);
    Route::patch('/request-tour/update/{requestTour}', [App\Http\Controllers\Backend\RequestTourController::class, 'update']);
    Route::delete('/request-tour/{requestTour}/drop', [App\Http\Controllers\Backend\RequestTourController::class, 'drop']);

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