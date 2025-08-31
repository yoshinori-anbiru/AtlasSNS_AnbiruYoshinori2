<x-login-layout>



    <!-- 投稿フォーム -->
    {!! Form::open(['url' => '/posts', 'method' => 'post']) !!}
    <div style="
    border-bottom: 10px solid #e0e0e0 ;" class="flex  mt-8 mb-6  border-gray-300 pl-[100px]  py-4">

        <!-- 左：アイコン -->
        <div>
            <img src="{{ asset('images/' . Auth::user()->icon_image) }}" width="60" height="60">
        </div>

        <!-- 右：投稿エリア -->
        <div class="ml-6  w-full">
            <div class="flex items-start gap-2">
                {{ Form::textarea('post', null, [
                    'required',
                    'class' => 'form_control placeholder-gray-400 text-[26px]  leading-relaxed
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 w-2/3 h-[150px] border-none
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      bg-[#f6f8fa]  p-2 focus:outline-none resize-none',
                    'placeholder' => '投稿内容を入力してください。',
                ]) }}
                <button type="submit" class=" items-end  self-end mb-4">
                    <img src="{{ asset('images/post.png') }}" width="60" height="60" alt="投稿">
                </button>
            </div>
        </div>

    </div>
    {!! Form::close() !!}





    <ul class="">
        @foreach ($posts as $post)
            <li class="my-4 pl-[150px] mr-5 text-[20px] py-5  block  gap-4">
                <div class="flex">

                    <!-- 左投稿者のアイコン -->
                    <div>
                        <img src="{{ asset('images/' . $post->user->icon_image) }}" width="60" height="60">

                    </div>

                    {{-- 右 --}}
                    <div class="blok ml-6 w-full">

                        <div class="flex
                      ">
                            <p>{{ $post->user->username }}</p>
                            <p class="text-gray-500 ml-auto text-xl font-mono whitespace-nowrap">
                                {{ $post->created_at->format('Y-m-d H:i') }}
                            </p>

                        </div>
                        <div class="blok">
                            <p class="mt-3">{{ $post->post }} </p>

                            <div class="content mt-2 flex justify-end  gap-2">
                                @if ($post->user_id === Auth::id())
                                    <!-- 編集ボタン -->
                                    <a class="js-modal-open" href="#" data-post="{{ $post->post }}"
                                        data-post-id="{{ $post->id }}">
                                        <img src="images/edit.png" alt="更新" width="50" height="50">
                                    </a>
                                    <!-- 消去ボタン -->
                                    <!-- 消去ボタン -->
                                    <div class="trash">
                                        <a href="{{ route('posts.delete', $post->id) }}"
                                            data-href="{{ route('posts.delete', $post->id) }}"
                                            class="js-delete-open group relative w-[50px] h-[50px] inline-block">
                                            <img src="{{ asset('images/trash.png') }}" alt="削除"
                                                class="absolute top-0 left-0 w-[50px] h-[50px] group-hover:opacity-0 transition-opacity duration-150 ease-in-out">
                                            <img src="{{ asset('images/trash-h.png') }}" alt="削除ホバー"
                                                class="absolute top-0 left-0 w-[50px] h-[50px] opacity-0 group-hover:opacity-100 transition-opacity duration-150 ease-in-out">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </li>
        @endforeach
    </ul>

    <!-- 削除モーダル -->
    <div class="modal js-delete-modal hidden fixed inset-0 z-50 flex  justify-center">
        <!-- 背景 -->
        <div class="modal__bg js-modal-close absolute inset-0 bg-gray-800/70"></div>

        <!-- コンテンツ -->
        <div class="modal__content relative bg-white h-[130px]  shadow-xl p-8 w-[90%] max-w-[520px] z-10">
            <h3 class=" font-bold mb-4">投稿を削除します、よろしいでしょうか？</h3>


            <div class="flex justify-end gap-3 mt-10 ">
                <button type="button"
                    class="js-delete-cancel text-white w-[100px] h-[40px] rounded border bg-[#186ac9] border-gray-300 hover:bg-[#7895d7]">
                    OK
                </button>
                <button type="button"
                    class="js-delete-confirm w-[100px] h-[40px] rounded border border-gray-300 hover:bg-gray-100">
                    キャンセル
                </button>
            </div>
        </div>
    </div>

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
    <div class="modal js-edit-modal hidden fixed inset-0 z-50 flex items-center justify-center">
        <!-- 背景 -->
        <div class="modal__bg js-modal-close absolute inset-0 bg-gray-800/70"></div>

        <!-- コンテンツ -->
        <div class="modal__content relative bg-white rounded-[10px] shadow-xl p-8 h-[350px] w-[60%] z-10">

            <form action="{{ route('posts.authorCreate') }}" method="post" class="space-y-4"
                onsubmit="return checkLen('postTextEdit','errorMsgEdit')">
                <textarea name="post" id="postTextEdit" maxlength="150"
                    class="text-[20px] leading-relaxed p-8 resize-none modal_post w-full h-[200px] border focus:ring-2 focus:ring-blue-500"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <p id="errorMsgEdit" class="text-red-500 text-sm hidden">150文字以内で入力してください。</p>
                <div class="flex justify-center gap-3">
                    <button type="submit" class="px-4 py-2 rounded">
                        <img src="images/edit.png" alt="更新" width="70" height="70">
                    </button>
                </div>
                @csrf
            </form>
        </div>
    </div>

    <script>
        // ===== 削除モーダル制御 =====
        const deleteModal = document.querySelector('.js-delete-modal');
        let deleteTargetHref = null; // どの投稿を削除するかのURLを保持

        document.addEventListener('click', (e) => {
            const delTrigger = e.target.closest('.js-delete-open');
            if (delTrigger) {
                e.preventDefault();
                deleteTargetHref = delTrigger.dataset.href || delTrigger.getAttribute('href');
                if (deleteModal) {
                    deleteModal.classList.remove('hidden');
                    deleteModal.classList.add('block');
                }
                return;
            }

            // モーダル背景 or キャンセル で閉じる
            if (e.target.closest('.js-modal-close') || e.target.closest('.js-delete-cancel')) {
                if (deleteModal) {
                    deleteModal.classList.remove('block');
                    deleteModal.classList.add('hidden');
                }
                deleteTargetHref = null;
                return;
            }

            // 「削除する」確定
            if (e.target.closest('.js-delete-confirm')) {
                if (deleteTargetHref) {
                    window.location.href = deleteTargetHref; // 既存のGETルートに遷移
                }
            }
        });

        // Esc キーで閉じる
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && deleteModal && deleteModal.classList.contains('block')) {
                deleteModal.classList.remove('block');
                deleteModal.classList.add('hidden');
                deleteTargetHref = null;
            }
        });
    </script>

    <script>
        // 編集モーダル：鉛筆アイコン（.js-modal-open）で開く
        const editModal = document.querySelector('.js-edit-modal');
        const modalTextarea = document.querySelector('.modal_post');
        const modalIdInput = document.querySelector('.modal_id');

        // イベント委譲（動的に増える投稿にも効く）
        document.addEventListener('click', (e) => {
            const trigger = e.target.closest('.js-modal-open');
            if (!trigger) return;
            e.preventDefault();

            const postText = trigger.dataset.post || '';
            const postId = trigger.dataset.postId || '';

            if (!postId) return; // 念のため

            if (modalTextarea) modalTextarea.value = postText;
            if (modalIdInput) modalIdInput.value = postId;

            if (editModal) {
                editModal.classList.remove('hidden');
                editModal.classList.add('block');
            }
        });

        // 閉じる（背景 or 閉じるリンク）
        if (editModal) {
            editModal.querySelectorAll('.js-modal-close, .modal__bg').forEach(el => {
                el.addEventListener('click', (e) => {
                    e.preventDefault();
                    editModal.classList.remove('block');
                    editModal.classList.add('hidden');
                });
            });

            // Escキーでも閉じる（任意）
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    editModal.classList.remove('block');
                    editModal.classList.add('hidden');
                }
            });
        }
    </script>


</x-login-layout>
