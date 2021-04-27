<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create(); // creating instance of faker libraray to create fake data

        DB::table("students")->insert([
            "name" => $faker->name(),
            "email" => $faker->safeEmail,
            "mobile" => $faker->phoneNumber,
            // "age" => $faker->numberBetween(25, 45),
            // "gender" => $faker->randomElement([
            //     "male",
            //     "female",
            //     "others"
            // ]),
            // "address_info" => $faker->address,
            // "password" => Hash::make("123455"),  // helps to create hash password
        ]);
    }
}
