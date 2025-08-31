<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
// DBを使う宣言
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;      
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
        $users = User::all();

        // 各ユーザーに対して 3〜7 件のランダム投稿を作成
        foreach ($users as $user) {
            $postCount = rand(3, 7);
            for ($i = 0; $i < $postCount; $i++) {
                Post::create([
                    'user_id' => $user->id,
                    'post' => $this->generateRandomContent(),
                ]);
            }
        }
    }

    // ランダムな投稿内容を生成
    private function generateRandomContent()
    {
        $texts = [
            '今日はいい天気ですね！',
            'Laravelの勉強中です。',
            '猫がかわいい。',
            'ランチはラーメンでした🍜',
            '新しいプロジェクト頑張るぞ！',
            '休日はゆっくり読書📚',
            'おはようございます！',
            '海鮮食いたい🐟',
            '貝食べたい',
            '働きたくない',
            ];

        return $texts[array_rand($texts)];
    }

}
