<x-login-layout>
    <h2>フォローしているユーザー一覧</h2>


    <li class="flex items-center gap-4 mb-2">

        @forelse ($followings as $user)
            <a href="{{ route('users.show', ['id' => $user->id]) }}">

                <img src="{{ asset('images/' . $user->icon_image) }}" width="50" height="50">
            </a>
        @empty
            <p>フォローしているユーザーはいません。</p>
        @endforelse
    </li>


    <ul>
        @forelse ($posts as $post)
            <li class="mb-2">
                <strong>{{ $post->user->username }}</strong>：
                {{ $post->post }}
                <small class="text-gray-500">（{{ $post->created_at->format('Y-m-d H:i') }}）</small>
            </li>
        @empty
            <p>投稿はありません。</p>
        @endforelse
    </ul>
</x-login-layout>
