<x-login-layout>
    <div class="my-20 pl-[100px]  flex gap-4">
        {!! Form::open(['url' => '/search', 'method' => 'GET', 'class' => 'flex gap-6']) !!}
        {{ Form::text('keyword', request('keyword'), ['placeholder' => 'ユーザー名', 'class' => 'input text-[26px]']) }}
        {!! Form::image(asset('/images/search.png'), 'search', ['class' => 'search-button']) !!}


        {{-- 横に検索キーワードを表示 --}}
        @if (request('keyword'))
            <span class="ml-[150px] text-[26px] text-gray-600">検索ワード：<strong>{{ request('keyword') }}</strong></span>
        @endif
        {!! Form::close() !!}




        @if ($users->isEmpty())
            <p class="text-[20px] mt-2 text-red-400">該当するユーザーが見つかりませんでした。</p>
        @endif

    </div>

    <ul class="border-t-[10px] border-solid border-[#e0e0e0]">
        @foreach ($users as $user)
            <li class="flex items-center border-none  gap-6 mb-2 my-4 pl-[30%] pr-[30%] mr-5 py-5">
                <!-- 左側：アイコンと名前 -->
                <div class="flex items-center gap-6 text-[24px] flex-1">
                    <img src="{{ asset('images/' . $user->icon_image) }}" width="60" height="60">
                    <span class="ml-5">{{ $user->username }}</span>
                </div>

                <!-- 右側：ボタン -->
                <div class="text-[#ffff]  text-center     block ">
                    @if (Auth::user()->followings->contains($user->id))
                        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class=" bg-[#ed3834]  text-white rounded-[10px]  px-[30px] py-4">
                                フォロー解除
                            </button>
                        </form>
                    @else
                        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-[#51acff] rounded-[10px] text-white px-[30px] py-4">
                                フォローする
                            </button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</x-login-layout>
