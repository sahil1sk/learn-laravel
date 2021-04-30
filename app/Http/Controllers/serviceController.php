<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Student;

class serviceController extends Controller
{
    public function service($locale) {

        App::setLocale($locale); // setting the locale language
        return view("service");
    }

    public function students() {
        return Student::all();
    }

    public function add() {
        $student = new Student;

        $student->name = "Vikash";
        $student->email = "vikash@gmail.com";
        $student->mobile = "898893834";

        if($student->save()) {
            echo "<h1>Student has been inserted </h1>";
        }        
    }
}
