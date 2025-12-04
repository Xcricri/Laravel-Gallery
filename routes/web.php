<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route for admin middleware
Route::middleware('auth')->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/posts', PostController::class);
});

// route for member middleware
Route::middleware('auth')->group(function(){
    Route::resource('/galleries', GalleryController::class);
    Route::resource('/photos', PhotoController::class);
});

require __DIR__.'/auth.php';
