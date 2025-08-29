<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/auctions', function () {
    return view('auctions/index');
});

Route::get('/register', function () {
    return view('register');
});