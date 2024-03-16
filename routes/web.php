<?php

use Illuminate\Support\Facades\Route;

//Front (Landing)
use App\Http\Controllers\Landing\LandingController;

//Member (Dashboard)
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\MyOrderController;
use App\Http\Controllers\Dashboard\ProfileController;

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
//                  url                   controller       method didalam controller
Route::get('detail_booking/{id}' , [LandingController::class, 'detail_booking'])->name('detail.booking.landing');
Route::get('booking/{id}' , [LandingController::class, 'booking'])->name('booking.landing');
Route::get('detail/{id}' , [LandingController::class, 'detail'])->name('detail,landing');
Route::get('explore' , [LandingController::class, 'explore'])->name('explore.landing');

Route::resource('/', LandingController::class);

//middleware
Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    
    //route untuk dashboard
    Route::resource('dashboard', MemberController::class);

    //service
    Route::resource('service', ServiceController::class);

    //request
    Route::get('approve_request/{id}' , [RequestController::class, 'approve'])->name('approve.landing');
    Route::resource('request', RequestController::class);

    //my order
    Route::get('accept/order/{id}', [MyOrderController::class, 'accepted'])->name('accept.order');
    Route::get('reject/order/{id}', [MyOrderController::class, 'rejected'])->name('reject.order');
    Route::resource('order', MyOrderController::class);

    //profile
    Route::get('delete_photo', [ProfileController::class, 'delete'])->name('delete.photo.profile');
    Route::resource('profile', ProfileController::class);

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

