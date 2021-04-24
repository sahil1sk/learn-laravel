<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/first', [Site::class, "first"]);