<x-login-layout>
    {!! Form::open(['url' => '/search', 'method' => 'GET']) !!}
    {{ Form::text('keyword', request('keyword'), ['placeholder' => 'ユーザー名', 'class' => 'input']) }}
    {!! Form::image(asset('/images/search.png'), 'search', ['class' => 'search-button']) !!}

    {{-- 横に検索キーワードを表示 --}}
    @if (request('keyword'))
        <span class="text-sm text-gray-600">検索ワード：<strong>{{ request('keyword') }}</strong></span>
    @endif
    {!! Form::close() !!}


    <h2>ユーザー一覧</h2>

    @if ($users->isEmpty())
        <p>該当するユーザーが見つかりませんでした。</p>
    @endif


    <ul>
        @foreach ($users as $user)
            <li class="flex items-center gap-4 mb-2">
                <img src="{{ asset('images/' . $user->icon_image) }}" width="50" height="50">
                <span>{{ $user->username }}</span>

                {{-- フォロー/フォロー解除ボタン --}}
                @if (Auth::user()->followings->contains($user->id))
                    {{-- フォロー済みならフォロー解除 --}}
                    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        <button type="submit" style="background: red">フォロー解除</button>
                    </form>
                @else
                    {{-- 未フォローならフォロー --}}
                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        <button type="submit" style="background: red">フォローする</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</x-login-layout>
