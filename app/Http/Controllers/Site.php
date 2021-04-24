<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site extends Controller
{
    public function first($id = 1) {
        echo "<h1>Welcome to First Method $id</h1>";
        return view("first");
    }
}
