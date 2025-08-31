<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'post'];

        // ユーザーとのリレーション（投稿は1人のユーザーに属する）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
// ユーザーは複数の投稿を持っている。
    public function posts()
{
    return $this->hasMany(Post::class);
}
}
