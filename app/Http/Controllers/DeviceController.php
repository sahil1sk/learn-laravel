<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{

    // -------- local scope
    public function getStudentsData() {
        $devices = Device::whereStatus(0)->get();

        echo"<pre>";
        print_r($devices);
    }
    
}
