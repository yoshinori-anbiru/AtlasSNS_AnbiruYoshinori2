<!-- Alpine.js を使う宣言 -->
<h1 style="margin: 0;"><a href="/posts"><img src="{{ asset('images/atlas.png') }}"></a></h1>

<details>
    <summary>{{ Auth::user()->username }}さん</summary>
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
