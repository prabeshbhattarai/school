<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                
                'usertype' => 'admin',
                

            ],

            //Student
            [
                'name' => 'Student',
                
                'email' => 'student@gmail.com',
                'password' => Hash::make('111'),
                
                'usertype' => 'student',
                

            ],

            //Teacher
            [
                'name' => 'Teacher',
                
                'email' => 'teacher@gmail.com',
                'password' => Hash::make('111'),
                
                'usertype' => 'teacher',
                

            ],

            //Parent
            [
                'name' => 'Parent',
                
                'email' => 'parent@gmail.com',
                'password' => Hash::make('111'),
                
                'usertype' => 'parent',
                

            ],

            //Accountant
            [
                'name' => 'Accountant',
               
                'email' => 'accountant@gmail.com',
                'password' => Hash::make('111'),
               
                'usertype' => 'accountant',
                

            ],
            

            ]);
        

    }
}
