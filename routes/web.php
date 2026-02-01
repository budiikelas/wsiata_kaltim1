<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index']);
Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Authentication Access
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Protected Routes (Login Required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Pages
    Route::get('/packages', [LandingController::class, 'packages']);
    Route::get('/trending', [LandingController::class, 'trending'])->name('trending');
    Route::get('/favorites', [LandingController::class, 'favorites'])->name('favorites');
    Route::get('/fasilitas', [LandingController::class, 'fasilitas'])->name('fasilitas');
    Route::get('/detail', [LandingController::class, 'detail']);

    // Action Logic
    Route::post('favorites/toggle', [\App\Http\Controllers\FavoriteController::class, 'toggle'])->name('favorites.toggle');

    // Resource Management
    Route::resource('categories', CategoryController::class);
    Route::resource('destinations', DestinationController::class);
    Route::resource('facilities', FacilityController::class);
    Route::post('galleries', [GalleryController::class, 'store']);
    Route::delete('galleries/{id}', [GalleryController::class, 'destroy']);

    // Admin Access
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/destinations', [\App\Http\Controllers\AdminController::class, 'destinations'])->name('admin.destinations');
        Route::get('/consumers', [\App\Http\Controllers\AdminController::class, 'consumers'])->name('admin.consumers');
        Route::put('/consumers/{id}', [\App\Http\Controllers\AdminController::class, 'updateConsumer'])->name('admin.consumers.update');
        Route::delete('/consumers/{id}', [\App\Http\Controllers\AdminController::class, 'deleteConsumer'])->name('admin.consumers.delete');
        Route::get('/facilities', [\App\Http\Controllers\AdminController::class, 'facilities'])->name('admin.facilities');
        Route::post('/facilities', [\App\Http\Controllers\AdminController::class, 'storeFacility'])->name('admin.facilities.store');
        Route::put('/facilities/{id}', [\App\Http\Controllers\AdminController::class, 'updateFacility'])->name('admin.facilities.update');
        Route::delete('/facilities/{id}', [\App\Http\Controllers\AdminController::class, 'deleteFacility'])->name('admin.facilities.delete');
    });
});
