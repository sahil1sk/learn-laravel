<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
    
    public function deleteFileFromServer($fileName){
        $filePath = public_path().'/uploads/'.$fileName;
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
}
