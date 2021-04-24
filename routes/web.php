<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;

Route::get('/', function () {
    return view('welcome');
});

Route::get("services/{id}", function($id) {
    echo "<h1>ID: $id </h1>";
})->where("id", "[0-9]+"); // id will accept only integer values

Route::get("services/{id}/{name}", function($id, $name) {
    echo "<h1>ID: $id </h1>";
    echo "<h1>Name: $name </h1>";
})->where(["id" => "[0-9]+", "name" => "[a-zA-Z]+"]); // name contains only a to z characters not integers 


Route::get("/list-view", function() {
    echo "<h1>This is list view page</h1>";
});

Route::get("/add-form", function() {
    return redirect("/list-view");
});


Route::get("/about-us", function() {
    echo "<h1>This is simple message </h1>";
});

Route::redirect("/products", "/about-us");

// ? helps to set it as optional parameter
Route::get('/first/{id?}', [Site::class, "first"]); 
