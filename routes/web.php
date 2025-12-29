<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PostCRUDL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\User;

// views
Route::view('/', 'home');
Route::view('/reset-password-message', 'auth.reset-password-message')->middleware('guest');
Route::view('/profile-delete', 'auth.profile-delete')->middleware('auth');
Route::view('/terms-of-service', 'terms-of-service');
Route::view('/privacy-policy', 'privacy-policy');

// registration
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// login
Route::get('/login', [SessionController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

// logout
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');


// profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified']);
Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware(['auth', 'verified']);
Route::get('/view-profile', [ProfileController::class, 'view'])->middleware(['auth', 'verified']);

// Verify Email
Route::get('/email-verification', [EmailVerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email-verification/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('auth')->name('verification.verify');
Route::post('/email-resend', [EmailVerificationController::class, 'send'])->middleware('auth')->name('verification.send');

// Reset password
Route::get('/forgot-password', [PasswordResetController::class, 'request'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'email'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'update'])->middleware('guest')->name('password.update');

// Posts
Route::get('/posts', [PostCRUDL::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/posts/create', [PostCRUDL::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/posts', [PostCRUDL::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/posts/{post}', [PostCRUDL::class, 'show'])->middleware(['auth', 'verified']);
Route::get('/posts/{post}/edit', [PostCRUDL::class, 'edit'])->middleware(['auth', 'verified'])->can('edit', 'post');
Route::patch('/posts/{post}', [PostCRUDL::class, 'update'])->middleware(['auth', 'verified'])->can('edit', 'post');
Route::delete('/posts/{post}', [PostCRUDL::class, 'destroy'])->middleware(['auth', 'verified'])->can('edit', 'post');

// Admin panel
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->can('admin', User::class);
Route::get('/admin/create', [AdminController::class, 'create'])->middleware(['auth', 'verified'])->can('admin', User::class);
Route::post('/admin', [AdminController::class, 'store'])->middleware(['auth', 'verified'])->can('admin', User::class);
Route::get('/admin/{user}/edit', [AdminController::class, 'edit'])->middleware(['auth', 'verified'])->can('admin', 'user');
Route::patch('/admin/{user}', [AdminController::class, 'update'])->middleware(['auth', 'verified'])->can('admin', 'user');
Route::delete('/admin/{user}', [AdminController::class, 'destroy'])->middleware(['auth', 'verified'])->can('admin', 'user');