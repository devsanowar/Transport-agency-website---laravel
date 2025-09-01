<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // profile routes
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('admin.profile.index');
    Route::put('/profile/update', [ProfileController::class, 'update'])
        ->name('admin.profile.update');
    Route::post('/profile/image/update', [ProfileController::class, 'updateImage'])
    ->name('admin.profile.image.update');


});


