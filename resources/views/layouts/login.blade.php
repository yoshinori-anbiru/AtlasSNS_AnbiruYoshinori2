<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header class="px-10 py-10 ">
        @include('layouts.navigation')
    </header>
    <!-- Page Content -->
    <div id="row">
        <div id="container">
            {{ $slot }}
        </div>
        <div style=" box-sizing: border-box;
    flex: 0 0 20%;
    border-left: 1px solid #727272;" class="relative">
            <nav id="menuList"
                class=" absolute top-0 left-0 arrow_items bg-[#f5f8fa] w-full text-center hidden transition-all duration-300 ease-in-out">
                <ul>
                    <li style="border: 1px solid #ccc;" class="py-8 hover:bg-[#00297e]"><a href="/posts">HOME</a></li>
                    <li style="border: 1px solid #ccc;" class="py-8 hover:bg-[#00297e]"><a
                            href="{{ route('profile.edit') }}">プロフィール編集</a></li>
                    <li style="border: 1px solid #ccc;" class="py-8 hover:bg-[#00297e]">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                </ul>
            </nav>

            <div id="confirm" class="p-4 pl-8"
                style= " box-sizing: border-box; flex: 0 0 20%; border-bottom: 1px solid
                #727272;">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class=" my-10">
                    <p class="mt-10 text-3xl">フォロー数

                        <span class="ml-[60px]">{{ Auth::user()->followings()->count() }}人</span>
                    </p>
                    <a class="btn-main block w-[50%] text-center ml-auto mt-10"
                        href="{{ route('follow.list') }}">フォローリスト</a>
                </div>
                <div class="my-2">
                    <p class="mt-10 text-3xl">フォロワー数
                        <span class="ml-[46px]">{{ Auth::user()->followers()->count() }}人</span>

                    </p>
                    <a class="btn-main block w-[50%] text-center ml-auto my-10"
                        href="{{ route('follower.list') }}">フォロワーリスト</a>
                </div>
            </div>

            <!-- 検索ボタン（下に固定・中央揃え） -->
            <div class="mb-6">
                <a class="btn-main block mt-20 w-[60%] mx-auto text-center"
                    href="{{ route('users.search') }}">ユーザー検索</a>
            </div>

        </div>
        <footer>
        </footer>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="JavaScriptファイルのURL"></script>
        <script src="JavaScriptファイルのURL"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleArrow = document.getElementById('toggleArrow');
                const menuList = document.getElementById('menuList');

                if (toggleArrow && menuList) {
                    toggleArrow.addEventListener('click', function() {
                        menuList.classList.toggle('hidden'); // メニュー表示/非表示を切り替え
                        toggleArrow.classList.toggle('rotate-x-180'); // 矢印をX軸で回転
                    });
                }
            });
        </script>
</body>

</html>
