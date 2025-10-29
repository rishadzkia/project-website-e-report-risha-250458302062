<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert(array(
        array(
            'name' => 'Admin Risha',
            'email' => 'admin@gmail.com',
            'phone' => '081234',
            'nik' => '23456',
            'gender' => 'female' ,
            'role' => 'admin',
            'password' => bcrypt('123') 

        ),
        array(
            'name' => 'User Adzkia',
            'email' => 'user@gmail.com',
            'phone' => '0851234',
            'nik' => '234856',
            'gender' => 'female' ,
            'role' => 'admin',
            'password' => bcrypt('123') 

       )
    
    ));
    }
}
