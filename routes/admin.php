<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BreadcrumbController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HomeAboutController;
use App\Http\Controllers\Admin\SocialIconController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SliderControlle;
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
    Route::prefix('website-settings')->name('admin.website.setting.')->group(function () {
        Route::get('/', [WebsiteSettingController::class, 'index'])->name('index');
        Route::put('/update', [WebsiteSettingController::class, 'update'])->name('update');
        Route::put('/color-update', [WebsiteSettingController::class, 'websiteColorupdate'])->name('color.update');
    });

    //social control route here
    Route::prefix('social-icon')->name('admin.social.icon.')->group(function () {
        Route::get('/', [SocialIconController::class, 'index'])->name('index');
        Route::put('/update', [SocialIconController::class, 'update'])->name('update');
    });

    // Breadcrumb route here
    Route::put('/breadcrumb', [BreadcrumbController::class, 'update'])->name('breadcrumb.update');


    // Theme customize route here
    Route::prefix('theme-customize')->name('admin.theme.customize.')->group(function () {
        Route::get('/', [ThemeCustomerController::class, 'index'])->name('index');
        Route::put('/update', [ThemeCustomerController::class, 'update'])->name('update');
    });

    // Website menu routes here
    Route::prefix('website-menu')->name('admin.website.menu.')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::post('/store', [MenuController::class, 'store'])->name('store');
        Route::put('/update/{id}', [MenuController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [MenuController::class, 'destroy'])->name('destroy');
    });


    // Post Category route here
    Route::prefix('post/category')->controller(PostCategoryController::class)->name('admin.post.category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    // Post Route here
    Route::prefix('post')->controller(PostController::class)->name('admin.post.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });


    //home page route here ======================================

    Route::prefix('home')->group(function(){
        Route::resource('slider', SliderControlle::class);
    });


    Route::prefix('home')->group(function(){
        Route::resource('feature', FeatureController::class);
    });

    Route::prefix('home')->group(function(){
        Route::get('home-about', [HomeAboutController::class, 'index'])->name('home-about.index');
        Route::put('/home-about/update', [HomeAboutController::class, 'update'])->name('home-about.update');
    });

    Route::prefix('home')->group(function(){
        Route::resource('services', ServicesController::class);
    });


});
