<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsTableSeeder extends Seeder
{
    public function run()
    {
        // 全ユーザーを取得
        $userIds = DB::table('users')->pluck('id')->toArray();

        // 各ユーザーがランダムに3〜8人をフォロー
        foreach ($userIds as $userId) {
            // 自分以外のユーザーをシャッフル
            $otherUsers = array_diff($userIds, [$userId]);
            shuffle($otherUsers);

            // ランダムな人数を選択
            $followCount = rand(20, 25);
            $followTargets = array_slice($otherUsers, 0, $followCount);

            foreach ($followTargets as $targetId) {
                // 重複チェックは unique 制約があるので無視してOK（try-catchでも良い）
                DB::table('follows')->insertOrIgnore([
                    'following_id' => $userId,
                    'followed_id'  => $targetId,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        }
    }
}