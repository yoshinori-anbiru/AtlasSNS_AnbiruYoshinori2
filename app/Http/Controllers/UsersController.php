<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function search(Request $request){
         $currentUserId = Auth::id(); // ログイン中のユーザーIDを取得
         $currentUser = Auth::user();
         $keyword = $request->input('keyword');//検索キーワードを取得

         // 自分以外のユーザー一覧を取得
         $users = User::where('id', '!=', $currentUserId)
            ->when($keyword, function ($query, $keyword){
                return $query->where('username','like',"%{$keyword}%");
            })
            ->get();

             // フォローしているユーザーのID配列を渡す
      $followingIds = $currentUser->followings->pluck('id')->toArray();



        return view('users.search', compact('users' , 'keyword'));
    }


    // UsersController.php

public function show($id)
{
    $user = User::findOrFail($id); // 指定IDのユーザーを取得（存在しない場合は404）

    return view('users.show', compact('user'));
}
}