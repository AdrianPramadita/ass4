<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'ini adalah admin',
                'email' => 'admin@example@gmail.com',
                'password' => bcrypt('admin123'),
                'level' => 'admin'

            ],
            
            [
                'username' => 'owner',
                'name' => 'ini adalah owner',
                'email' => 'owner@example@gmail.com',
                'password' => bcrypt('owner123'), 
                'level' => 'owner'
            ]
            ];

            foreach ($user as $key => $value){
                User::create($value);
        }
    }
}
