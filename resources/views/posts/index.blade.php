<x-login-layout>



  <!-- 投稿フォーム-------------------------------------- -->
 {!! Form::open(['url' => '/posts' ,'method' => 'post']) !!}
   <div class="form_group">
     <img src="images/icon1.png">
     {{ Form::textarea('post', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください。']) }}
     <button type="submit" class="btn"><img src="images/post.png" alt=""></button>
   </div>
 {!! Form::close() !!}


  <ul>
    @foreach($posts as $post)
    <li>{{ $post->post }} ({{ $post->created_at }})
        <div class="content">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"> <img src="images/edit.png" alt="更新" width="50" height="50"></a>
        <!-- 消去ボタン -->
        <div class="trash">
          <a class="btn-trash" href="{{ route('posts.delete', $post->id) }}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
            <img src="images/trash.png" alt="更新" width="50" height="50">
            <img src="images/trash-h.png" alt="更新" width="50" height="50">
          </a>
        </div>
    </div>
    </li>
    @endforeach
  </ul>

  <!-- バリデーションのエラー  ------------>
  @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{ route('posts.authorCreate', '') }}" method="post">
                <textarea name="post" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <button type="submit">
                  <img src="images/edit.png" alt="更新" width="50" height="50">
                </button>

                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>



</x-login-layout>
