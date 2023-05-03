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
Route::get('/tour-packages/detail/{slug}', [App\Http\Controllers\Frontend\TourPackageController::class, 'detail']);
Route::post('/tour-packages/detail/send/{slug}', [App\Http\Controllers\Frontend\TourPackageController::class, 'comment']);
Route::get('/tour-packages/request', [App\Http\Controllers\Frontend\TourPackageController::class, 'request']);
Route::post('/tour-packages/request/send', [App\Http\Controllers\Frontend\TourPackageController::class, 'send']);

Route::get('/promo', [App\Http\Controllers\Frontend\PromoController::class, 'index']);
Route::get('/promo/detail/{slug}', [App\Http\Controllers\Frontend\PromoController::class, 'detail']);
Route::post('/promo/detail/send/{slug}', [App\Http\Controllers\Frontend\PromoController::class, 'comment']);

Route::get('/article', [App\Http\Controllers\Frontend\ArticleController::class, 'index']);
Route::get('/article/detail/{slug}', [App\Http\Controllers\Frontend\ArticleController::class, 'detail']);
Route::post('/article/detail/send/{slug}', [App\Http\Controllers\Frontend\ArticleController::class, 'comment']);

Route::get('/about-us', [App\Http\Controllers\Frontend\AboutController::class, 'index']);

// Start BE
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // dashboard
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index']);

    // rental
    Route::get('/rental/list-rental', [App\Http\Controllers\Backend\RentalController::class, 'lrIndex']);
    Route::get('/rental/list-rental/add', [App\Http\Controllers\Backend\RentalController::class, 'lrAdd']);
    Route::post('/rental/list-rental/store', [App\Http\Controllers\Backend\RentalController::class, 'lrStore']);
    Route::get('/rental/list-rental/{rental}/edit', [App\Http\Controllers\Backend\RentalController::class, 'lrEdit']);
    Route::patch('/rental/list-rental/update/{rental}', [App\Http\Controllers\Backend\RentalController::class, 'lrUpdate']);
    Route::delete('/rental/list-rental/{rental}/drop', [App\Http\Controllers\Backend\RentalController::class, 'lrDrop']);

    Route::get('/rental/list-gallery-rental', [App\Http\Controllers\Backend\RentalController::class, 'lrgIndex']);
    Route::post('/rental/list-gallery-rental/store', [App\Http\Controllers\Backend\RentalController::class, 'lrgStore']);
    Route::get('/rental/list-gallery-rental/{rentalGallery}/edit', [App\Http\Controllers\Backend\RentalController::class, 'lrgEdit']);
    Route::patch('/rental/list-gallery-rental/update/{rentalGallery}', [App\Http\Controllers\Backend\RentalController::class, 'lrgUpdate']);
    Route::delete('/rental/list-gallery-rental/{rentalGallery}/drop', [App\Http\Controllers\Backend\RentalController::class, 'lrgDrop']);
    
    Route::get('/rental/list-rating-rental', [App\Http\Controllers\Backend\RentalController::class, 'lrrIndex']);
    Route::post('/rental/list-rating-rental/store', [App\Http\Controllers\Backend\RentalController::class, 'lrrStore']);
    Route::patch('/rental/list-rating-rental/{rentalRating}/update', [App\Http\Controllers\Backend\RentalController::class, 'lrrUpdate']);
    Route::delete('/rental/list-rating-rental/{rentalRating}/drop', [App\Http\Controllers\Backend\RentalController::class, 'lrrDrop']);
    Route::post('/rental/list-rating-rental/update/all', [App\Http\Controllers\Backend\RentalController::class, 'lrrAll']);

    // packet
    Route::get('/packet/list-packet', [App\Http\Controllers\Backend\PacketController::class, 'lpaIndex']);
    Route::get('/packet/list-packet/add', [App\Http\Controllers\Backend\PacketController::class, 'lpaAdd']);
    Route::post('/packet/list-packet/store', [App\Http\Controllers\Backend\PacketController::class, 'lpaStore']);
    Route::get('/packet/list-packet/{packet}/edit', [App\Http\Controllers\Backend\PacketController::class, 'lpaEdit']);
    Route::patch('/packet/list-packet/update/{packet}', [App\Http\Controllers\Backend\PacketController::class, 'lpaUpdate']);
    Route::delete('/packet/list-packet/{packet}/drop', [App\Http\Controllers\Backend\PacketController::class, 'lpaDrop']);

    Route::get('/packet/list-gallery-packet', [App\Http\Controllers\Backend\PacketController::class, 'lpagIndex']);
    Route::post('/packet/list-gallery-packet/store', [App\Http\Controllers\Backend\PacketController::class, 'lpagStore']);
    Route::get('/packet/list-gallery-packet/{packetGallery}/edit', [App\Http\Controllers\Backend\PacketController::class, 'lpagEdit']);
    Route::patch('/packet/list-gallery-packet/update/{packetGallery}', [App\Http\Controllers\Backend\PacketController::class, 'lpagUpdate']);
    Route::delete('/packet/list-gallery-packet/{packetGallery}/drop', [App\Http\Controllers\Backend\PacketController::class, 'lpagDrop']);
    
    Route::get('/packet/list-rating-packet', [App\Http\Controllers\Backend\PacketController::class, 'lparIndex']);
    Route::post('/packet/list-rating-packet/store', [App\Http\Controllers\Backend\PacketController::class, 'lparStore']);
    Route::patch('/packet/list-rating-packet/{packetRating}/update', [App\Http\Controllers\Backend\PacketController::class, 'lparUpdate']);
    Route::delete('/packet/list-rating-packet/{packetRating}/drop', [App\Http\Controllers\Backend\PacketController::class, 'lparDrop']);
    Route::post('/packet/list-rating-packet/update/all', [App\Http\Controllers\Backend\PacketController::class, 'lparAll']);

    // article
    Route::get('/article/list-article', [App\Http\Controllers\Backend\ArticleController::class, 'laIndex']);
    Route::get('/article/list-article/add', [App\Http\Controllers\Backend\ArticleController::class, 'laAdd']);
    Route::post('/article/list-article/store', [App\Http\Controllers\Backend\ArticleController::class, 'laStore']);
    Route::get('/article/list-article/{article}/edit', [App\Http\Controllers\Backend\ArticleController::class, 'laEdit']);
    Route::patch('/article/list-article/update/{article}', [App\Http\Controllers\Backend\ArticleController::class, 'laUpdate']);
    Route::delete('/article/list-article/{article}/drop', [App\Http\Controllers\Backend\ArticleController::class, 'laDrop']);

    Route::get('/article/list-comment-article', [App\Http\Controllers\Backend\ArticleController::class, 'lacIndex']);
    Route::post('/article/list-comment-article/store', [App\Http\Controllers\Backend\ArticleController::class, 'lacStore']);
    Route::patch('/article/list-comment-article/{articleComment}/update', [App\Http\Controllers\Backend\ArticleController::class, 'lacUpdate']);
    Route::delete('/article/list-comment-article/{articleComment}/drop', [App\Http\Controllers\Backend\ArticleController::class, 'lacDrop']);
    Route::post('/article/list-comment-article/update/all', [App\Http\Controllers\Backend\ArticleController::class, 'lacAll']);

    // promo
    Route::get('/promo/list-promo', [App\Http\Controllers\Backend\PromoController::class, 'lpIndex']);
    Route::get('/promo/list-promo/add', [App\Http\Controllers\Backend\PromoController::class, 'lpAdd']);
    Route::post('/promo/list-promo/store', [App\Http\Controllers\Backend\PromoController::class, 'lpStore']);
    Route::get('/promo/list-promo/{promo}/edit', [App\Http\Controllers\Backend\PromoController::class, 'lpEdit']);
    Route::patch('/promo/list-promo/update/{promo}', [App\Http\Controllers\Backend\PromoController::class, 'lpUpdate']);
    Route::delete('/promo/list-promo/{promo}/drop', [App\Http\Controllers\Backend\PromoController::class, 'lpDrop']);

    Route::get('/promo/list-comment-promo', [App\Http\Controllers\Backend\PromoController::class, 'lpcIndex']);
    Route::post('/promo/list-comment-promo/store', [App\Http\Controllers\Backend\PromoController::class, 'lpcStore']);
    Route::patch('/promo/list-comment-promo/{promoComment}/update', [App\Http\Controllers\Backend\PromoController::class, 'lpcUpdate']);
    Route::delete('/promo/list-comment-promo/{promoComment}/drop', [App\Http\Controllers\Backend\PromoController::class, 'lpcDrop']);
    Route::post('/promo/list-comment-promo/update/all', [App\Http\Controllers\Backend\PromoController::class, 'lpcAll']);

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

    Route::get('/account/edit-profile', [App\Http\Controllers\Backend\AccountController::class, 'editProfile']);
    Route::post('/account/save-profile', [App\Http\Controllers\Backend\AccountController::class, 'saveProfile']);
    Route::post('/account/save-profile-password', [App\Http\Controllers\Backend\AccountController::class, 'saveProfilePassword']);
});

Auth::routes();
Route::get('/register', function(){
    return redirect('/login');
});