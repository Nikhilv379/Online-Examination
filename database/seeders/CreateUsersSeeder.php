<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateusersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'anshkhajuria1212@gmail.com',
               'role'=> 'admin',
               'password'=>Hash::make('123456'),
            ],
            [
               'name'=>'teacher User',
               'email'=>'teacher@gmail.com',
               'role'=> 'teacher',
               'password'=> Hash::make('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'role'=>'student',
               'password'=> Hash::make('123456'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
