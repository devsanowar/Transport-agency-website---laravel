<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SocialIconController;
use App\Http\Controllers\Admin\ThemeCustomerController;
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
        Route::put('/color-update', [WebsiteSettingController::class, 'websiteColorupdate'])->name('color.update');
    });

    //social control route here
    Route::prefix('social-icon')->name('admin.social.icon.')->group(function(){
        Route::get('/', [SocialIconController::class, 'index'])->name('index');
        Route::put('/update', [SocialIconController::class, 'update'])->name('update');
    });

    // Theme customize route here
    Route::prefix('theme-customize')->name('admin.theme.customize.')->group(function(){
        Route::get('/', [ThemeCustomerController::class, 'index'])->name('index');
        Route::put('/update', [ThemeCustomerController::class, 'update'])->name('update');
    });

    // Website menu routes here
    Route::prefix('website-menu')->name('admin.website.menu.')->group(function(){
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::post('/store', [MenuController::class, 'store'])->name('store');
        Route::put('/update/{id}', [MenuController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [MenuController::class, 'destroy'])->name('destroy');
    });



});
