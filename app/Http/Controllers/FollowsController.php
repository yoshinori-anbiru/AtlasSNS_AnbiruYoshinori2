<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowsController extends Controller
{


public function follow($id)
{
    $user = Auth::user();

    // すでにフォローしていなければフォローする
    if (!$user->followings->contains($id)) {
        $user->followings()->attach($id);
        return back()->with('success', 'フォローしました！');
    }

    return back()->with('info', 'すでにフォローしています。');
}
    // フォロー解除
public function unfollow($id)
{
    $user = Auth::user();

    if ($user->followings->contains($id)) {
        $user->followings()->detach($id);
        return back()->with('success', 'フォローを解除しました！');
    }

    return back()->with('info', 'フォローしていません。');
}

    // フォロー中一覧
    public function followList(){
    $user = Auth::user();
    $followings = $user->followings;
    // フォローしているユーザーの ID を取得
    $followingIds = $followings->pluck('id');
     // フォローしているユーザーの投稿を取得（新しい順）
    $posts = \App\Models\Post::whereIn('user_id', $followingIds)->latest()->get();
    return view('follows.followList', compact('followings','posts'));
    }

    public function followerList(){
    $user = Auth::user();
    $followers = $user->followers;

    return view('follows.followerList', compact('followers','posts' ));
    }
}