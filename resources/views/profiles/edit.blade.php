<x-login-layout>
    <div class="mt-[100px] flex pl-[25%] ">
        <img src="/images/icon1.png" class="block w-[50px] h-[50px] mr-20">
        @if (session('status'))
            <div class="text-green-500 mb-4">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
            class="space-y-20 w-[70%] text-[20px] ">
            @csrf

            <!-- ユーザー名 -->

            <div class="flex items-center !mt-[0px]">
                <label class="w-[30%]  mr-[50px]">ユーザー名</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                    class="flex-1 border  bg-[#efefef] border-gray-300 h-auto text-[20px] rounded px-3 py-2">
            </div>
            @error('username')
                <div class="ml-40 text-red-500 text-sm">・{{ $message }}</div>
            @enderror

            <!-- メールアドレス -->
            <div class="flex items-center">
                <label class="w-[30%]  mr-[50px]">メールアドレス</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="flex-1 border  bg-[#efefef] border-gray-300 rounded h-auto text-[20px] px-3 py-2">
            </div>
            @error('email')
                <div class="ml-40 text-red-500  text-sm">・{{ $message }}</div>
            @enderror

            <!-- パスワード -->
            <div class="flex items-center">
                <label class="w-[30%] mr-[50px]">パスワード</label>
                <input type="password" name="password"
                    class=" bg-[#efefef] h-auto text-[20px] flex-1 border border-gray-300 rounded px-3 py-2">
            </div>
            @error('password')
                <div class="ml-40 text-red-500 text-sm">・{{ $message }}</div>
            @enderror

            <!-- パスワード確認 -->
            <div class="flex items-center">
                <label class="w-[30%]  mr-[50px]">パスワード確認</label>
                <input type="password" name="password_confirmation"
                    class="flex-1 border  bg-[#efefef] h-auto text-[20px] border-gray-300 rounded px-3 py-2">
            </div>

            <!-- 自己紹介 -->
            <div class="flex items-start">
                <label class="w-[30%]  mr-[50px] pt-2">自己紹介</label>
                <textarea name="bio"
                    class=" bg-[#efefef] flex-1 border resize-none  px-3 pt-7  text-[20px] border-gray-300 rounded ">{{ old('bio', $user->bio) }}</textarea>
            </div>
            @error('bio')
                <div class="ml-40 text-red-500 text-sm">・{{ $message }}</div>
            @enderror

            <!-- アイコン画像 -->
            <div class="flex items-center">
                <label class="w-[30%] mr-[50px] ">アイコン画像</label>
                <div class="flex-1">
                    <label style="border:solid 1px rgb(209 213 219);"
                        class="w-full h-[80px]  flex items-center justify-center bg-[#efefef] rounded text-[20px] cursor-pointer">

                        <span class="bg-[#fff] px-10  cursor-pointer  py-2 text-[#a0a0a0]">ファイルを選択</span>


                        <input type="file" name="icon_image" class="hidden">
                    </label>
                </div>
            </div>

            <!-- 更新ボタン -->
            <div class="flex justify-center">
                <button type="submit" class="bg-red-500 text-white px-32 py-2 rounded-[6px]">
                    更新
                </button>
            </div>
        </form>
    </div>
</x-login-layout>
