<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// DBを使う宣言
use Illuminate\Support\Facades\DB;
//暗号化
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            
            [

                'username' => 'Atlas一郎',
                'email' => 'atlas1@gmail.com',
                'password' => Hash::make('password123'),
            ],
            [

                'username' => 'Atlas二郎',
                'email' => 'atlas2@gmail.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
