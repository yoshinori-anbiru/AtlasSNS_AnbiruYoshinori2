<x-login-layout>
    <h2 class="text-xl font-bold mb-4">プロフィール</h2>

    <div class="flex items-center gap-4 mb-6">
        <img src="{{ asset('images/' . $user->icon_image) }}" width="100" height="100" class="rounded-full border">
        <div>
            <p><strong>ユーザー名：</strong>{{ $user->username }}</p>
            <p><strong>自己紹介：</strong>{{ $user->bio }}</p>
        </div>

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
    </div>

    <ul>
        @forelse ($posts as $post)
            <li class="mb-2 border-b pb-2 flex">
                <img src="{{ asset('images/' . $user->icon_image) }}" width="50" height="50"
                    class="rounded-full border">
                <p>{{ $post->post }}</p>
                <small class="text-gray-500">{{ $post->created_at->format('Y-m-d H:i') }}</small>
            </li>
        @empty
            <p>投稿はありません。</p>
        @endforelse
    </ul>


</x-login-layout>
