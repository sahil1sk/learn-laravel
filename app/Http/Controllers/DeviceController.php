<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Scopes\StatusScope;

class DeviceController extends Controller
{

    // -------- local scope
    public function getStudentsData() {
        // $devices = Device::all(); // so here automatically the codition of global scope will aplied
        
        // to get data without global scope
        $devices = Device::withoutGlobalScope(StatusScope::class)->get(); 
        

        // $devices = Device::whereStatus(0)->get();

        echo"<pre>";
        print_r($devices);
    }
    
}