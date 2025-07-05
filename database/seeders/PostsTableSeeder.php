<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
// DBを使う宣言
use Illuminate\Support\Facades\DB;
//Carbonを使う宣言
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'post' => 'こんにちは、Laravel！',
                //Carbonを使って「今の時間」を取得
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'post' => 'AtlasSNS開発中！',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
