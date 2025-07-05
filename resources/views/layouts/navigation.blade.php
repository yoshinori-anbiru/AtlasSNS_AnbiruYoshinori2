<!-- Alpine.js を使う宣言 -->
<div id="head" x-data="{ open: false }">
    <h1><a href="/posts"><img src="images/atlas.png"></a></h1>

    <div>
        <p>{{ Auth::user()->username }}さん</p>
        <div @click="open = !open" class="a">
        </div>

        <nav class="arrow_items">
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40">
                <ul class="nav-">
                    <li><a href="">ホーム</a></li>
                    <li><a href="">プロフィール</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>