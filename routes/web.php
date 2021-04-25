<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about-us', function () {
    return view('about', [
        "page" => "About Us"
    ]);
});

Route::get('products', function () {
    return view('products', [
        "page" => "Product"
    ]);
});
