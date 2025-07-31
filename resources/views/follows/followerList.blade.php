<x-login-layout>
    <h2>フォロワーリスト</h2>
    @forelse ($followers as $followerUser)
        <p>{{ $followerUser->username }}</p>
    @empty
        <p>フォローされているユーザーはいません。</p>
    @endforelse
</x-login-layout>
