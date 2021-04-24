<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about-us', function () {


    // Return data using compact
    // $title = 'Welcome To Laravel';
    // return view('pages.index', compact('title'));

    // Return data using with
    // $title = 'About Us';
    // return view('pages.about')->with('title', $title);

    // sending multiple data keys using with
    $data = array(
        'title' => "About Us",
        'about' => ['Web Design', 'Programming', 'SEO']
    );
    return view('about')->with($data);

    // sending data directly
    // return view('about', ["title" => "Title", "name" => "name"]);
});

// controller, router name, data which we pass
Route::view("about", "about", ["title" => "Title", "name" => "name"]);
