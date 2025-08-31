<x-login-layout>


    <li style="
    border-bottom: 10px solid #e0e0e0 ;" class=" pl-40 pt-20 flex pb-10">
        <h2 class="mt-4 text-[26px] w-[300px] mr-10">フォローリスト</h2>
        <div class="flex w-full flex-wrap items-center gap-4">
            @forelse ($followings as $user)
                <a href="{{ route('users.show', ['id' => $user->id]) }}" class="inline-block">
                    <img src="{{ asset('images/' . $user->icon_image) }}" width="60" height="60"
                        alt="{{ $user->username }}">
                </a>
                @if ($loop->iteration % 10 === 0)
                    <span class="w-full"></span>
                @endif
            @empty
                <p>フォローしているユーザーはいません。</p>
            @endforelse
        </div>
    </li>


    <ul>
        @forelse ($posts as $post)
            <li class="my-4 pl-[150px] mr-5 text-[20px]  py-5  block  gap-4">
                <div class="flex">


                    {{-- 左：アイコン --}}

                    <div>
                        <img src="{{ asset('images/' . $post->user->icon_image) }}" width="60" height="60">
                    </div>

                    {{-- 右 --}}
                    <div class="blok ml-6 w-full">
                        <div class="flex">


                            <p>{{ $post->user->username }}</p>
                            <p class="text-gray-500 ml-auto text-xl font-mono whitespace-nowrap">
                                {{ $post->created_at->format('Y-m-d H:i') }}
                            </p>
                        </div>

                        <div class="blok">
                            <p class="mt-3">{{ $post->post }} </p>
                        </div>


                    </div>





                </div>
            </li>
        @empty
            <p>投稿はありません。</p>
        @endforelse
    </ul>
</x-login-layout>
