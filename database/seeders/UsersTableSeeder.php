<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ja_JP');

        // 固定ユーザーを追加（任意）
        DB::table('users')->insert([
            [
                'username' => 'Atlas一郎',
                'email' => 'atlas1@gmail.com',
                'password' => Hash::make('password123'),
                'bio' => 'Laravelが大好きな一郎です！',
                'icon_image' => 'icon1.png',
            ],
            [
                'username' => 'Atlas二郎',
                'email' => 'atlas2@gmail.com',
                'password' => Hash::make('password123'),
                'bio' => 'PHPを勉強中の二郎です。',
                'icon_image' => 'icon2.png',
            ],
        ]);

        // ランダムユーザー20件を追加
        for ($i = 1; $i <= 40; $i++) {
            DB::table('users')->insert([
                'username' => $faker->lastName . $faker->firstName,
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'bio' => $faker->realText(30),
                //ランダムで１〜７のアイコン画像を設定
                'icon_image' => 'icon' . rand(1, 7) . '.png',
            ]);
        }
    }
}