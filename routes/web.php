<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;

// ログイン処理

require __DIR__ . '/auth.php';
//routes/auth.php の中身を routes/web.php に読み込んで実行する。
//routes/auth.php にルーティングが記載されている



Route::middleware(['auth'])->group(function (){

    // 各ページのルーティング
    Route::get('top', [PostsController::class, 'index']);
    // 投稿一覧（トップページ）
    Route::get('/posts', [PostsController::class, 'index']);
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::post('/posts/authorCreate/{id}', [PostsController::class, 'authorCreate'])->name('posts.authorCreate');
    Route::get('/posts/delete/{id}', [PostsController::class, 'delete'])->name('posts.delete');

    Route::get('profile', [ProfileController::class, 'profile']);
    Route::get('/search', [UsersController::class, 'search'])->name('users.search');


    Route::post('/follow/{id}', [FollowsController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{id}', [FollowsController::class, 'unfollow'])->name('unfollow');

    Route::get('/follow-list', [FollowsController::class, 'followList'])->name('follow.list');
    Route::get('/follower-list', [FollowsController::class, 'followerList'])->name('follower.list');

    
    
    Route::get('/users/{id}', [ProfileController::class, 'show'])->name('users.show');
    
    
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    

    
});

