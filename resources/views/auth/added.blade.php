<x-logout-layout>
    <div id="clear">
        <div class="added_title">

            <p>{{ session('username') }}さん</p>
            <p>ようこそ！AtlasSNSへ！</p>
        </div>


        <div class="added_subtitle">
            <p>ユーザー登録が完了いたしました。</p>
            <p>早速ログインをしてみましょう!</p>
        </div>

        <a class="flex mx-auto mt-6 rounded-xl justify-center items-center bg-red-500 text-white w-40 h-12 rounded"
            href="/login">
            ログイン画面へ
        </a>
    </div>
</x-logout-layout>
