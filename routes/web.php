<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// 1 route name than 2 view name
Route::view("noaccess", "noaccess");

// adding routes inside group middleware
// Route::group(["middleware" => ["apprestrict"]], function() {     
//     Route::get('sample1', function () {
//         echo "<h2>Sample 1 Page </h2>";
//     });

//     Route::get('sample2', function () {
//         echo "<h2>Sample 2 Page </h2>";
//     });
// });

// so in this way we are able to add specific middleware
Route::get('sample2', function () {
    echo "<h2>Sample 2 Page </h2>";
})->middleware("apprestrict"); 

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

Route::get("list-students", [StudentController::class, "listStudents"]);
Route::get("save-student", [StudentController::class, "insertStudent"]);

Route::get("users", [StudentController::class, "get_users"]);

Route::get("adding-student", [StudentController::class, "addStudentByModel"]);
Route::post("submitting-data", [StudentController::class, "submitDataByModel"]);



Route::get('products', function () {
    return view('products', [
        "page" => "Product"
    ]);
});
