<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SocialIconController;
use App\Http\Controllers\Admin\WebsiteSettingController;

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Profile Management Routes
    Route::prefix('profile')->name('admin.profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::post('/image/update', [ProfileController::class, 'updateImage'])->name('image.update');
    });

    // Password Management Route
    Route::prefix('password')->name('admin.password.')->group(function () {
        Route::post('/update', [ProfileController::class, 'changePassword'])->name('update');
    });

    // Website Settings route
    Route::prefix('website-settings')->name('admin.website.setting.')->group(function(){
        Route::get('/', [WebsiteSettingController::class, 'index'])->name('index');
        Route::put('/update', [WebsiteSettingController::class, 'update'])->name('update');
    });

    Route::prefix('social-icon')->name('admin.social.icon.')->group(function(){
        Route::get('/', [SocialIconController::class, 'index'])->name('index');
        Route::put('/update', [SocialIconController::class, 'update'])->name('update');
    });



});
