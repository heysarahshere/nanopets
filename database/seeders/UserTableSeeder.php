<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => "admin",
            'firstname' => "Noah",
            'lastname' => "Covey",
            'email' => "admin@nanopets.org",
            'password' => bcrypt('p@ss123'),
            'admin' => true,
            'balance' => 923423
        ]);

        User::create([
            'username' => "sister",
            'firstname' => "Noah",
            'lastname' => "Covey",
            'email' => "jarseph@aol.com",
            'password' => bcrypt('p@ss123'),
            'admin' => true,
            'balance' => 923423
        ]);

        User::create([
            'username' => "jimmy",
            'firstname' => "Noah",
            'lastname' => "Covey",
            'email' => "ncovey8@gmail.com",
            'password' => bcrypt('p@ss123'),
            'admin' => true,
            'balance' => 923423
        ]);
    }
}
