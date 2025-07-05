<x-logout-layout>

  {!! Form::open(['url' => '/login', 'method' => 'post']) !!}

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
  {{ Form::submit('ログイン') }}

  <p><a href="/register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}

</x-logout-layout>