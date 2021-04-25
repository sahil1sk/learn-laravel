<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function myForm(Request $req) {
        if($req->isMethod("post")) {
            $req->validate([
                "name" => "required|min:4|max:20",
                "email" => "required",                    // "|unique:students,email" if we want to check the email in student table is unique
                "mobile" => "required|digits_between:9,11"
            ]);   
            print_r($req->all());
        }
        return view("my-form");
    }

    public function submitStudent(Request $request) {
        print_r($request->input("name"));
    }
}
