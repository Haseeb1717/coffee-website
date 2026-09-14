<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LocaleController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/qrcode',function(){
    return view('qrcode');
});

Route::get('/menu', [CoffeeController::class, 'index'])->name('menu');

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
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/coffees', [CoffeeController::class, 'adminIndex'])->name('admin.coffees.index');
    Route::get('/admin/coffees/create', [CoffeeController::class, 'create'])->name('admin.coffees.create');
    Route::post('/admin/coffees', [CoffeeController::class, 'store'])->name('admin.coffees.store');
    Route::get('/admin/coffees/{coffee}/edit', [CoffeeController::class, 'edit'])->name('admin.coffees.edit');
    Route::put('/admin/coffees/{coffee}', [CoffeeController::class, 'update'])->name('admin.coffees.update');
    Route::delete('/admin/coffees/{coffee}', [CoffeeController::class, 'destroy'])->name('admin.coffees.destroy');

    // Keep the old endpoints available for existing forms and bookmarks.
    Route::get('/admin/addcoffee', [CoffeeController::class, 'adminIndex'])->name('admin.addcoffee');
    Route::post('/admin/addcoffee', [CoffeeController::class, 'store'])->name('admin.addcoffee.store');
    Route::put('/admin/addcoffee/{coffee}', [CoffeeController::class, 'update'])->name('admin.addcoffee.update');
    Route::delete('/admin/addcoffee/{coffee}', [CoffeeController::class, 'destroy'])->name('admin.addcoffee.destroy');
});

Route::get('/reset', function () {
    return view('Reset');
});

Route::get('/forgetpassword', function () {
    return view('Forget');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/discount', function () {
        return view('admin.discount');
    })->name('admin.discount');
});


Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
//this route is language 
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('lang.switch');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});