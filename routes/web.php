<?php

declare(strict_types=1);

use App\Http\Controllers\Breed;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/breed/{breedId}', [Breed::class, 'index'])->name('breed');
