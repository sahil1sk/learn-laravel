<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use App\Models\Student;
use App\Http\Controllers\DeviceController;

Route::get("devices", [DeviceController::class, "getStudentsData"]);

Route::get("test", function() {
    echo url("call/5") . "<br>";
    echo url()->current() . "<br>";
    echo url()->full() . "<br>";
    
    echo URL::full() . "<br>"; // Using url facades
    
    // In route we are able to pass only named routes
    echo route("call", ["id" => 3]) . "<br>"; // In route function we are able to pass only named routes 
    echo route("sample") . "<br>";

    // -- In action we are able to pass only Controllers routes
    echo action([StudentController::class, "addStudent"], ["id" => 2 ]);
});

Route::get("student/{id}", [StudentController::class, "addStudent"]);

Route::get("call/{id}", function($id) {
    echo "This is a call route $id";
})->name("call");

Route::get("sample", function() {
    echo "This is a sample route";
})->name("sample");

// this will return the data according to student id
Route::get('/student/{studentID}', function(Student $studentID) {
    return $studentID;
});

// --- This will try to match the email column string from the student table and according to that send back the data 
Route::get('/student/{studentID:email}', function(Student $studentID) {
    return $studentID;
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
