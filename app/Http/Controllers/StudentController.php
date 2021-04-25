<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentData;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function addStudent() {
        return view("my-form");
    }


    // manual validation handling
    public function submitData(Request $req) {
        $validate = Validator::make($req->all(), [
            "name" => "required|min:4",
            "email" => "required",
            "mobile" => "required"
        ], [
            "name.required" => "Name value is needed" // IN this way we are able to send custom error message
        ]); // ->validate() will automatically send back to the page if error exsists   
        
        if($validate->fails()) {
            // if not validated then we will redirect to the page with errors
            return redirect("add-student")->withErrors($validate);
        }

        print_r($req->all());
    }

    // Using request class for the validation
    // public function submitData(StoreStudentData $req) {
    //     $req->validated(); // trigger validated rules
    //     print_r($req->all());
    // }

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
