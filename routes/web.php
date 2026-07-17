<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Email Verification Routes
Route::get('/verify-email', [AuthController::class, 'showVerifyEmail'])->name('verify-email')->middleware('auth');
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verify.email');
Route::post('/resend-verification-email', [AuthController::class, 'resendVerificationEmail'])->name('resend-verification-email')->middleware('auth');

// Protected Routes - Require Auth & Email Verification
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()?->role === 'admin') {
            abort(403, 'Admins cannot access the customer dashboard.');
        }

        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        if (auth()->user()?->role !== 'admin') {
            abort(403, 'Only admins can access the admin dashboard.');
        }

        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::get('/reset', function () {
    return view('Reset');
});

Route::get('/forgetpassword', function () {
    return view('Forget');
});
