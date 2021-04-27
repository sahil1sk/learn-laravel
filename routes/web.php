<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about-us', function () {
    return view('about', [
        "page" => "About Us"
    ]);
});

// Route::get("add-student", [StudentController::class, "myForm"]);
// Route::post("submit-student", [StudentController::class, "submitStudent"]);
// match helps to match any of the request type
// Route::match(["get", "post"], "add-student", [StudentController::class, "myForm"]);
Route::get("add-student", [StudentController::class, "addStudent"]);
Route::post("submit-data", [StudentController::class, "submitData"]);

Route::get("users", [StudentController::class, "get_users"]);

Route::get("adding-student", [StudentController::class, "addStudentByModel"]);
Route::post("submitting-data", [StudentController::class, "submitDataByModel"]);



Route::get('products', function () {
    return view('products', [
        "page" => "Product"
    ]);
});
