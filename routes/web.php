<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('authors', AuthorController::class)->middleware('auth');
Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('auth');
Route::resource('books', BookController::class)->middleware('auth');
Route::resource('clients', \App\Http\Controllers\ClientController::class);
Route::resource('reservations', App\Http\Controllers\ReservationController::class);

require __DIR__.'/auth.php';
