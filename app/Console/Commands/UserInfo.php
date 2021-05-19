<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UserInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display us the user info after getting the Name and email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Enter your name?');
        $email = $this->ask('Enter your email?');
        $password = bcrypt($this->ask('Enter your password?'));
        $this->info('The User info is: ' . $name . " " . $email . " " . $password);

        $input["name"] = $name;
        $input["email"] = $email;
        $input["password"] = $password;

        User::create($input);

        $this->info("User created successfully!");

        // --- Listing user data in table format
        $this->table(
            ['ID', 'Name', 'Email'],
            User::all(['id', 'name', 'email'])->toArray()
        );
    }
}
