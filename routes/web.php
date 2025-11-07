<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\PetController::class, 'index'])->name('dashboard');
Route::get('/pets/{pet}', [\App\Http\Controllers\PetController::class, 'show'])->name('pets.show');
