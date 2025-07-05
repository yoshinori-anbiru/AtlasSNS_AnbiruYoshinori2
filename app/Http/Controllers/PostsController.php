<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{

  
    // 投稿一覧表示----------------------------------------------------------------
      public function index(Request $request)
    {
          // 投稿一覧を取得
        $posts = Post::all(); // モデルPostを使用して全ての投稿を取得

        // 取得した投稿データをビューに渡す
        return view('posts.index', compact('posts'));
    }

    // 投稿を消去----------------------------------------------------------------
        public function delete($id)
    {
        // 指定されたIDの投稿を削除
        Post::where('id', $id)->delete();

        // 投稿一覧ページにリダイレクト
          return redirect('/posts');
    }


     // 投稿処理----------------------------------------------------------------
        public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'post' => [
                 'required',//入力必須
                 'min:1',   //1文字以上
                 'max:150'  //150文字以内
            ]
        ]);

        // データベースに投稿を保存
         Post::create([
            'user_id' => auth()->id(),  // ログインしているユーザーIDを保存
            'post' => $request->input('post'),
        ]);

        // 投稿一覧ページにリダイレクト
        return redirect('/posts')->with('success', '投稿が保存されました。');
    }





      public function authorCreate(Request $request, $id)
    {
        // リクエストから投稿内容を取得
        $request->validate([
            'post' => 'required|min:1|max:150', // バリデーション
        ]);

        $post = Post::findOrFail($request->input('id')); //リクエストから投稿IDを取得
        //findOrFailメソッドは、指定されたIDのレコードが見つからなかった場合に、自動的に404エラーページを表示。見つかった場合は、その投稿データを取得し、$postに格納。
        $post->post = $request->input('post');
        $post->save();

        // 前のページにリダイレクト
        return redirect('/posts');


        //     Post::findOrFail(3)で、IDが3の投稿を取得。
        // 取得した投稿の内容を"新しい投稿内容"に変更。
        // save()メソッドを使って、データベース上の投稿を更新
    }

}
