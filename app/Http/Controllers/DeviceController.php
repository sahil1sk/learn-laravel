<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Scopes\StatusScope;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\MarkMail;

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
    

    public function sendMail() {
        $details = [
            "title" => "Sample Mail",
            "body" => "Sample body",
        ];

        Mail::to("khannasahil303@gmail.com")->send(new TestMail($details));

        echo "<h3> Mail sent successfully! </h3>";
    }

    public function sendMarkDownMail() {
        $details = [
            "title" => "Sample Mail",
            "body" => "Sample body",
        ];

        Mail::to("khannasahil303@gmail.com")->send(new MarkMail($details));

        echo "<h3> Mail sent successfully! </h3>";
    }
}
