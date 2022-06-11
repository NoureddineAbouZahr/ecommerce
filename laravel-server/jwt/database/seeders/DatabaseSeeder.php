<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([    

            'name' => 'nour',  
   
            'email' => 'nour@gmail.com',   
   
            'password' => Hash::make('nour123'), 
            
            'role' => 1
   
         ]);    
    }
}
