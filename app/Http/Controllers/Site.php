<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site extends Controller
{
    public function first() {
        // echo "<h1>Welcome to First Method</h1>";
        return view("first");
    }
}
