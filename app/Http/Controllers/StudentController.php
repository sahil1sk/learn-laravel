<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    public function addStudent() {
        return view("my-form");
    }

    // ------- QUERY BUILDER
    public function listStudents() {
        // $students = DB::table("students")->where("id", 1)->select("name", "email as email_address")->get();

        // $students = DB::table("students")->where("id", 1)->select("name", "email as email_address")->first();

        // $students = DB::table("students")->select("name", "email as email_address")->find(1);

        // >where("id", ">=", 330) // finding the element where id is greater than equal to 330
        // $students = DB::table("students")->where("email", "like", "%example.org")->select("name", "email as email_address")->get();

        // $students = DB::table("students")->where("id", 1)->where("name", "Sahil Khanna")->get();

        // $students = DB::table("students")->where("id", 1)->where(function($query){
        //     $query->where("name", "Sahil Khanna")->orWhere("email", "khannasahil303@gmail.com");
        // })->get();

        // $students = DB::table("students")->whereBetween("id", [0, 1])->get();

        // $students = DB::table("students")->whereIn("id", [0, 1, 2,5])->get();

        // joining the table by using the student id and course std_id
        $students = DB::table("students")->select("students.id", "students.name as student_name", "courses.name", "courses.id")->join("courses", "students.id", "=", "courses.student_id")->get();

        // leftJoin means it will go to left side table first which here is students than to other means first select all the rows of left side table than join with right side table
        $students = DB::table("students")->select("students.id", "students.name as student_name", "courses.name", "courses.id")->leftJoin("courses", "students.id", "=", "courses.student_id")->get();

        // now in right join it will take the right table first which here is courses
        $students = DB::table("students")->select("students.id", "students.name as student_name", "courses.name", "courses.id")->rightJoin("courses", "students.id", "=", "courses.student_id")->get();


        echo "<pre>";
        print_r($students);
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
            return redirect("add-student")->withErrors($validate)->withInput(); // ->withInput() helps to send the old input value which we are able then it will used in old function 
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

    public function get_users() {
        $users = DB::select("SELECT * FROM tbl_users WHERE id = :id", ["id" => 2]);

        // echo "<pre>";
        // print_r($users);
        foreach ($users as $user) {
            echo $user->name . "<br>";
        }
    }

    public function insert_user() {
        $user = DB::insert("Insert into tbl_users (name, email, phone_no) values (:name, :email, :phone_no)", 
        [
            "name" => "Aman",
            "email" => "email@gmail.com",
            "phone_no" => "1234567888"
        ]);
        print_r($user);
    }

    public function update_user() {
        $user = DB::update("update tbl_users SET email = :email WHERE id = :id", [
            "id" => 1,
            "email" => "sanjay_kumar@gmail.com"
        ]);
        print_r($user);
    }

    public function delete_user() {
        $user = DB::delete("DELETE FROM tbl_users WHERE id = :id", [
            "id" => 3,
        ]);
        print_r($user);
    }

    // ------------- Using Model

    public function addStudentByModel() {
        return view("my-form");
    }

    public function submitDataByModel(Request $request) {
        // print_r($request->all());
        $student_obj = new Student;
        $student_obj->name = $request->name;
        $student_obj->email = $request->email;
        $student_obj->mobile = $request->mobile;

        $student_obj->save();

        // set flash message
        // session()->flash("key", "message");
        $request->session()->flash("success", "Student has been created successfully");
        return redirect("adding-student");
    }
}
