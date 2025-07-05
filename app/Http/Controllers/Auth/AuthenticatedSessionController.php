<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    // ログイン
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); //  ここでログインのバリデーションと認証

        $request->session()->regenerate();// セッションIDを再生成（セキュリティのため）

        return redirect()->intended('top');// ログイン成功後、/top にリダイレクト
    }


    // ログアウト
    public function destroy(Request $request): RedirectResponse
{
    Auth::guard('web')->logout(); // ログアウト処理　　（web）ふつうのフォームログインのやり方の名前

    $request->session()->invalidate(); // セッションを無効化
    $request->session()->regenerateToken(); // CSRFトークン再生成

    return redirect('/login'); // トップページなどにリダイレクト
}



}
