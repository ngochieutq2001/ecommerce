<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin route
Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return view('admin.dashboard');
});

// Seller route
Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::get('/seller', function () {
        return view('seller.dashboard');
    });
});

// User route (mặc định Breeze đã có)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
