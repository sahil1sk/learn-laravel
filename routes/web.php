<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about-us', function () {
    return view('about');
});

Route::get('products', function () {
    return view('products');
});
