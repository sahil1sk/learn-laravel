<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentData;

class StudentController extends Controller
{
    public function addStudent() {
        return view("my-form");
    }

    public function submitData(StoreStudentData $req) {
        $req->validated(); // trigger validated rules
        print_r($req->all());
    }

    public function myForm(Request $req) {
        if($req->isMethod("post")) {
            $req->validate([
                "name" => "required|min:4|max:20",
                "email" => "required",                    // "|unique:students,email" if we want to check the email in student table is unique
                "mobile" => "required|digits_between:9,11"
            ], [
                "name.required" => "Name value is needed" // IN this way we are able to send custom error message
            ]);   
            print_r($req->all());
        }
        return view("my-form");
    }

    public function submitStudent(Request $request) {
        print_r($request->input("name"));
    }
}
