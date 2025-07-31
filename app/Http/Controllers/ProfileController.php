<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Http\Requests\EditProfileRequest;



class ProfileController extends Controller
{

public function show($id)
{
    $user = User::findOrFail($id); // 指定IDのユーザーを取得（存在しなければ404）


    $posts = $user->posts()->latest()->get(); // 新しい順で取得
    return view('profiles.profile', compact('user','posts'));
}

public function edit()
{
    $user = Auth::user(); // ログイン中のユーザー
    return view('profiles.edit', compact('user'));
}

public function update(EditProfileRequest $request)
{
    $user = Auth::user();

    $user->username = $request->username;
    $user->email = $request->email;
    $user->bio = $request->bio;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    if ($request->hasFile('icon_image')) {
        $filename = time() . '.' . $request->icon_image->extension();
        $request->icon_image->storeAs('public/icons', $filename);
        $user->icon_image = $filename;
    }

    $user->save();

    return redirect()->route('profile')->with('status', 'プロフィールを更新しました。');
}
}