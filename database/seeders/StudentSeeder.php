<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("students")->insert([
            "name" => "Sanjay Kumar",
            "email" => "sanjay@gmail.com",
            "mobile" => "1234567890",
            "age" => 56,
            "gender" => "male",
            "address_info" => "Dummy value"
        ]);
    }
}
