<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\ContactMailController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Social\SocialLoginController;
use App\Mail\ContactMail;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutPageController::class, 'index'])->name('about.page');
Route::get('/services', [ServicesController::class, 'index'])->name('services.page');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.page');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.page');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.page');
Route::post('/contact-form', [ContactMailController::class, 'store'])->name('contact.mail.store');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
