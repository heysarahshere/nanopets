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
            'admin' => true
        ]);
    }
}
