        <div id="head">
            <h1><a href="/posts"><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                   <p>{{ Auth::user()->username }}さん</p>
                </div>
                <ul>
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
        </div>