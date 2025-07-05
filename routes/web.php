<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;

// ログイン処理

require __DIR__ . '/auth.php';
//routes/auth.php の中身を routes/web.php に読み込んで実行する。
//routes/auth.php にルーティングが記載されている



Route::middleware(['auth'])->group(function (){

    // 各ページのルーティング
    Route::get('top', [PostsController::class, 'index']);
    // 投稿一覧（トップページ）
    Route::get('/posts', [PostsController::class, 'index']);
    Route::post('/posts/authorCreate/{id}', [PostsController::class, 'authorCreate'])->name('posts.authorCreate');
    Route::get('/posts/delete/{id}', [PostsController::class, 'delete'])->name('posts.delete');

    Route::get('profile', [ProfileController::class, 'profile']);
    Route::get('search', [UsersController::class, 'index']);
    Route::get('follow-list', [PostsController::class, 'index']);
    Route::get('follower-list', [PostsController::class, 'index']);
});