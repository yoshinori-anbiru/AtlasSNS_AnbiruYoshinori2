<x-login-layout>


    <div style="
    border-bottom: 10px solid #e0e0e0 ;"
        class="flex  mt-8 mb-10 pb-10  border-gray-300 pl-[100px]  py-4">
        <div>
            <img src="{{ asset('images/' . $user->icon_image) }}" width="60" height="60" class="rounded-full border">

        </div>
        <div class="ml-[20px] text-[20px]">
            <div class="flex">
                <div class="w-[100px]">ユーザー名</div>
                <div class="ml-[100px]">{{ $user->username }}</div>
            </div>
            <div class="flex mt-10">
                <div class="w-[100px]">自己紹介</div>
                <div class="ml-[100px]"> {{ $user->bio }}</div>
            </div>

        </div>
        <div class="text-[#ffff] bg-[#ed3834]  text-center pt-2 ml-auto mr-5 mt-[60px] rounded-[10px] block ">

            @if (Auth::user()->followings->contains($user->id))
                {{-- フォロー済みならフォロー解除 --}}
                <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-[30px] py-2">フォロー解除</button>
                </form>
            @else
                {{-- 未フォローならフォロー --}}
                <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-[30px] py-2">フォローする</button>
                </form>
            @endif
        </div>
    </div>

    <ul>
        @forelse ($posts as $post)
            <li class="my-4 pl-[150px] mr-5 text-[20px] py-5  block  gap-4">
                <div class="flex">
                    <div>


                        <img src="{{ asset('images/' . $user->icon_image) }}" width="50" height="50"
                            class="rounded-full border">
                    </div>

                    <div class="blok ml-6 w-full">

                        <div class="flex
                      ">

                            <p>{{ $post->user->username }}</p>
                            <p class="text-gray-500 ml-auto text-xl font-mono whitespace-nowrap">
                                {{ $post->created_at->format('Y-m-d H:i') }}
                            </p>
                        </div>
                        <div class="blok">
                            <p>{{ $post->post }}</p>

                        </div>
                    </div>
                </div>
            </li>
        @empty
            <p>投稿はありません。</p>
        @endforelse
    </ul>


</x-login-layout>
