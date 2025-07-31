<x-login-layout>
    <h2 class="text-xl font-bold mb-4">プロフィール編集</h2>

    @if (session('status'))
        <div class="text-green-500 mb-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label>ユーザー名</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}">
            @error('username')
                <div class="text-red-500 text-sm">・{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="text-red-500 text-sm">・{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label>パスワード（変更しない場合は空欄）</label>
            <input type="password" name="password">
            @error('password')
                <div class="text-red-500 text-sm">・{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label>パスワード確認</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="mb-4">
            <label>自己紹介</label>
            <textarea name="bio">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <div class="text-red-500 text-sm">・{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label>アイコン画像</label>
            <input type="file" name="icon_image">
            @error('icon_image')
                <div class="text-red-500 text-sm">・{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">更新する</button>
    </form>
</x-login-layout>
