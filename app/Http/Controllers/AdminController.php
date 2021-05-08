<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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

    // for uploading files
    public function upload(Request $request) {
        $picName = time() . '.'. $request->file->extension();     
        $request->file->move(public_path('uploads'), $picName); // uploading inside public foler inside uploads folder with the name given
        return $picName;   
    }
}
