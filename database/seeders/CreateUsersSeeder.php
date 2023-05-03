<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Worker User',
               'email'=>'admin@tutsmake.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
               'phone' =>"123456789789",
               'job_name' => 'dasdasd',
               'address' => 'dsadasddasd',
            ],
            [
               'name'=>'Worker User',
               'email'=>'manager@tutsmake.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
               'phone' =>"1234567897489",
               'job_name' => 'dasdasd',
               'address' => 'dsadasddasd',


            ],
            [
               'name'=>'User',
               'email'=>'user@tutsmake.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
               'phone' =>"1234567897189",
               'job_name' => 'dasdasd',
               'address' => 'dsadasddasd',


            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
    
}
