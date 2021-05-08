<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addTag(Request $request) {
        // dd($request);
        return Tag::create([
            "tagName" => $request->tagName
        ]);
    }

    public function getTag() {
        // order by id in descending order
        return Tag::orderBy("id", "desc")->get();
    }
}
