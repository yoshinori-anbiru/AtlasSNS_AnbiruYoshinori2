<x-logout-layout>
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => '/register', 'method' => 'post', 'class' => 'from_login  from_register']) !!}

    <h2 class="text-2xl">新規ユーザー登録</h2>

    {{ Form::label('ユーザー名') }}
    {{ Form::text('username', null, ['class' => 'relative input']) }}
    @error('username')
        <div class="text-red-500 absolute text-sm mt-1">{{ $message }}</div>
    @enderror

    {{ Form::label('メールアドレス') }}
    {{ Form::email('email', null, ['class' => 'relative input']) }}
    @error('email')
        <div class="text-red-500 absolute text-sm mt-1">{{ $message }}</div>
    @enderror


    {{ Form::label('パスワード') }}
    {{ Form::password('password', ['class' => 'relative input']) }}
    @error('password')
        <div class="text-red-500 text-sm absolute mt-1">{{ $message }}</div>
    @enderror


    {{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation', ['class' => 'relative input']) }}

    @error('password_confirmation')
        <div class="text-red-500 text-sm absolute mt-1">{{ $message }}</div>
    @enderror

    {{ Form::submit('新規登録', ['class' => 'btn btn-danger']) }}

    <p><a href="login" class="underline">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}


</x-logout-layout>
