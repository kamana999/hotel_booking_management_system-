<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ConfirmBokkingController;

Route::get('/',[Home::class, "index"])->name('home');
Route::get('/room_type/{id}',[Home::class, "room_type"])->name('room_type');

Route::post('/bookings/{room_id}', [Home::class, "booking"])->name('bookings');


Route::prefix('admin')->group(function(){
    Route::get('/categorydashboard', function () {
        return view('admin.admindashboard');
    })->name('categorydashboard');  

    Route::resource('roomcategory', RoomCategoryController::class)->middleware('auth');
    Route::resource('rooms', RoomController::class)->except(['create'])->middleware('auth');
    Route::resource('hotels', HotelController::class)->except(['create'])->middleware('auth');
    // Route::resource('booking', BookingController::class)->except(['create','show'])->middleware('auth');
    Route::get('/booking', [ConfirmBokkingController::class,'index'])->name('booking')->middleware('auth');
    Route::get('/edit/{id}', [ConfirmBokkingController::class,'edit'])->name('edit')->middleware('auth');
    Route::put('/update/{id}', [ConfirmBokkingController::class,'update'])->name('update')->middleware('auth');
    
    
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
