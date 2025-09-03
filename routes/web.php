<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Auction;
use App\Models\Product;
use App\Models\Store;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuctionController;

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/', function () {
    $auctions = Auction::with('images')->latest()->take(8)->get();
    $buynow = Product::with('images')->latest()->take(8)->get();

    return view('welcome', compact('auctions', 'buynow'));
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/extra/update', [ProfileController::class, 'updateExtra'])->name('profile.extra.update');

    Route::post('/store/request', [StoreController::class, 'requestStore'])->name('store.request');
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
    Auth::guard('web')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/auctions', [AuctionController::class, 'index'])->name('auctions.index');
Route::get('/auctions/{id}', [AuctionController::class, 'view'])->name('auctions.view');

Route::get('/buynow', function () {
    $buynow = Product::with('images')->latest()->get();
    return view('buynow/index', compact('buynow'));
});

Route::get('/stores', function () {
    $stores = Store::all();
    return view('stores/index', compact('stores'));
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