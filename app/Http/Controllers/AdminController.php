<?php

namespace App\Http\Controllers;

use App\Models\Tag; 
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // ------ login and logout
    public function index(Request $request){
        // first check if you are loggedin and admin user ... 
        //return Auth::check();
        if(!Auth::check() && $request->path() != 'login'){
            return redirect('/login');
        }
        
        if(!Auth::check() && $request->path() == 'login' ){
            return view('welcome');
        }

        // you are already logged in... so check for if you are an admin user.. 
        $user = Auth::user();
        if($user->userType =='User'){
            return redirect('/login');
        }

        if($request->path() == 'login'){
            return redirect('/');
        }

        return view('welcome');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    // ------- Tags
    public function addTag(Request $request) {
        // dd($request);
        $this->validate($request, [
            'tagName' => 'required'
        ]);

        return Tag::create([
            "tagName" => $request->tagName
        ]);
    }

    public function getTag() {
        // order by id in descending order
        return Tag::orderBy("id", "desc")->get();
    }

    public function editTag(Request $request){
        // validate request 
        $this->validate($request, [
            'tagName' => 'required', 
            'id' => 'required', 
        ]);
        return Tag::where('id', $request->id)->update([
            'tagName' => $request->tagName
        ]);
    }
    public function deleteTag(Request $request){
        // validate request 
        $this->validate($request, [
            'id' => 'required', 
        ]);
        return Tag::where('id', $request->id)->delete();
    }

    // For Uploading Files
    public function upload(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:jpeg,jpg,png'
        ]);
        $picName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $picName); // uploading inside public foler inside uploads folder with the name given
        return $picName;
    }

    public function deleteImage(Request $request){
        $fileName = $request->imageName; 
        $this->deleteFileFromServer($fileName);
        return 'done';
    }
    
    public function deleteFileFromServer($fileName, $hasFullPath = false){
        if(!$hasFullPath) {
            $filePath = public_path().'/uploads/'.$fileName;
        } else {
            $filePath = public_path() . $fileName;
        }

        if(file_exists($filePath)){
            @unlink($filePath); // for deleting the image
        }
        return;
    }

    // ----- Category
    public function addCategory(Request $request){
        // validate request 
        $this->validate($request, [
            'categoryName' => 'required',
            'iconImage' => 'required',
        ]);
        return Category::create([
            'categoryName' => $request->categoryName,
            'iconImage' => $request->iconImage,
        ]);
    }

    public function getCategory(){
        // getting category by id in descending order
        return Category::orderBy('id', 'desc')->get();
    }
    
    public function editCategory(Request $request){
        // validate request 
        $this->validate($request, [
            'categoryName' => 'required',
            'iconImage' => 'required',
        ]);
        return Category::where('id', $request->id)->update([
            'categoryName' => $request->categoryName,
            'iconImage' => $request->iconImage,
        ]);
    }

    public function deleteCategory(Request $request) {
        $this->deleteFileFromServer($request->iconImage, true);        

        $this->validate($request, [
            'id' => 'required', 
        ]);
        return Category::where('id', $request->id)->delete();
    }

    // ---------- Create user
    public function createUser(Request $request) {
        // bail means if first condition failed then don't go to another one
        $this->validate($request, [
            'fullName' => 'required',
            'email' => 'bail|required|email|unique:users', // unique:users email should be unique in users table       
            'password' => 'bail|required|min:6',
            'userType' => 'required',
        ]);

        $password = bcrypt($request->password);
        $user = User::create([
            'fullName' => $request->fullName,
            'email' => $request->email,
            'password' => $password,
            'userType' => $request->userType,
        ]);
        return $user;
    }

    public function getUsers() {
        // now this will only return editor and admin type users
        return User::where('userType', '!=', 'User')->get(); 
    }

    public function editUser(Request $request) {
        // bail means if first condition failed then don't go to another one
        $this->validate($request, [
            'fullName' => 'required',           // email,$request->id ignoring the unique condition for the same user id this conditon
            'email' => "bail|required|email|unique:users,email,$request->id", // unique:users email should be unique in users table       
            'password' => 'min:6',
            'userType' => 'required',
        ]);
        
        $data = [
            'fullName' => $request->fullName,
            'email' => $request->email,
            'userType' => $request->userType,
        ];

        if($request->password) {
            $password = bcrypt($request->password);
            $data["password"] = $password;
        }

        $user = User::where('id', $request->id)->update($data);
        return $user;
    }

    // ------ Admin login
    public function adminLogin(Request $request) {
        $this->validate($request, [
            'email' => 'bail|required|email',
            'password' => "bail|required|min:6",
        ]);
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if($user->userType == "User") {
                Auth::logout();
                return response()->json([
                    "msg" => "Incorrect login details"
                ], 401);
            }

            return response()->json([
                "msg" => "You are logged in",
                "user" => $user
            ]);
        } else {
            return response()->json([
                "msg" => "Incorrect Login details"
            ], 401);
        }
    }
}
  