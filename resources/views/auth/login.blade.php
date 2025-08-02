<x-logout-layout>

    {!! Form::open(['url' => '/login', 'method' => 'post', 'class' => 'from_login']) !!}

    <p>AtlasSNSへようこそ</p>

    {{-- メールアドレス --}}
    {{ Form::label('email', 'メールアドレス') }}
    {{ Form::text('email', old('email'), ['class' => 'input']) }}
    @error('email')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror

    {{-- パスワード --}}
    {{ Form::label('password', 'パスワード') }}
    {{ Form::password('password', ['class' => 'input']) }}
    @error('password')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror

    {{-- ログインボタン --}}
    {{ Form::submit('ログイン', ['class' => 'btn btn-danger']) }}
    <p class="from_login_added"><a href="/register" class="underline
">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}

</x-logout-layout>
