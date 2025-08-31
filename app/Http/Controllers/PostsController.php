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





  public function authorCreate(Request $request)
{
    // 1) 厳格バリデーション（stringを明示）
    $validated = $request->validate([
        'id'   => ['required','integer','exists:posts,id'],
        'post' => ['required','string','max:150'],
    ], [
        'post.max' => '投稿は150文字以内で入力してください。',
    ]);

    $post = Post::findOrFail($validated['id']);

    // 2) 念のためサーバ側で150文字に丸める（合成文字や絵文字対策にも有効）
    $clean = trim($validated['post']);
    $clean = mb_substr($clean, 0, 150);

    $post->post = $clean;
    $post->save();

    return redirect('/posts')->with('success', '投稿を更新しました');
}

}
