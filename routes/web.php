<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Student;


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
