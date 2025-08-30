<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function() {
    return view('show/login');
})->name('login');

// A single, cleaner way to handle both the GET and POST for registration.
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store'); // No name needed for post route if form action is `route('register')`
});

// Login Routes
// Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
// In routes/web.php

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/auctions', function () {
    return view('auctions/index');
});

Route::get('/buynow', function () {
    return view('buynow/index');
});