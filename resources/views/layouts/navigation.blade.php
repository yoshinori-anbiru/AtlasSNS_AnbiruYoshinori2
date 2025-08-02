<!-- Alpine.js を使う宣言 -->


<h1 style="margin: 0;"><a href="/posts"><img class="w-[100px]" src="{{ asset('images/atlas.png') }}"></a></h1>

<div class="ml-auto">
    <details>
        <summary class="text-[#ffff]">{{ Auth::user()->username }}さん</summary>
        <img src="images/icon1.png">
        <nav>
            <ul>
                <li><a href="#">ホーム</a></li>
                <li><a href="{{ route('profile.edit') }}">プロフィール</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">ログアウト</button>
                    </form>
                </li>
            </ul>
        </nav>
    </details>
</div>
