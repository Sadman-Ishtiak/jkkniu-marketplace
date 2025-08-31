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

Route::get('/stores', function () {
    return view('stores/stores');
});


Route::get('/categories', function () {
    // This is temporary placeholder data.
    // We are simulating what would be returned from your database.
    $categories = collect([
        (object) [
            'id' => 1,
            'name' => 'Electronics',
            'subcategories' => collect([
                (object) ['id' => 11, 'name' => 'Smartphones', 'slug' => 'smartphones', 'subcategories' => collect()],
                (object) ['id' => 12, 'name' => 'Laptops', 'slug' => 'laptops', 'subcategories' => collect()],
                (object) ['id' => 13, 'name' => 'Cameras', 'slug' => 'cameras', 'subcategories' => collect()],
            ]),
        ],
        (object) [
            'id' => 2,
            'name' => 'Fashion',
            'subcategories' => collect([
                (object) [
                    'id' => 21,
                    'name' => 'Men\'s Fashion',
                    'slug' => 'mens-fashion',
                    'subcategories' => collect([
                        (object) ['id' => 211, 'name' => 'T-Shirts', 'slug' => 't-shirts'],
                        (object) ['id' => 212, 'name' => 'Jeans', 'slug' => 'jeans'],
                    ]),
                ],
                (object) [
                    'id' => 22,
                    'name' => 'Women\'s Fashion',
                    'slug' => 'womens-fashion',
                    'subcategories' => collect([
                        (object) ['id' => 221, 'name' => 'Dresses', 'slug' => 'dresses'],
                        (object) ['id' => 222, 'name' => 'Skirts', 'slug' => 'skirts'],
                    ]),
                ],
            ]),
        ],
        (object) [
            'id' => 3,
            'name' => 'Home & Garden',
            'subcategories' => collect([
                (object) ['id' => 31, 'name' => 'Furniture', 'slug' => 'furniture', 'subcategories' => collect()],
                (object) ['id' => 32, 'name' => 'Kitchen Appliances', 'slug' => 'kitchen-appliances', 'subcategories' => collect()],
            ]),
        ],
    ]);

    return view('categories', compact('categories'));
})->name('categories');