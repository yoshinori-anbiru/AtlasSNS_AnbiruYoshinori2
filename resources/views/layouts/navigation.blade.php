<!-- Alpine.js を使う宣言 -->
<div id = "head" class="flex">
    <div class="mr-auto">
        <h1 class="w-auto "><a class="w-auto " href="/posts"><img src="{{ asset('images/atlas.png') }}"
                    class=" w-[150px] h-auto"></a>
        </h1>
    </div>
    <div class=" ml-auto flex items-center gap-10 perspective-1000">
        <p class="text-[24px] text-white">{{ Auth::user()->username }}<span>さん</span></p>

        <svg id="toggleArrow"
            class="w-16 h-16 text-white mt-2 scale-150 cursor-pointer transform origin-center transition-transform duration-300"
            fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.585l3.71-4.355a.75.75 0 111.14.976l-4.25 5a.75.75 0 01-1.14 0l-4.25-5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
        </svg>

        <img src="{{ asset('images/' . Auth::user()->icon_image) }}" width="50" height="50">
    </div>
</div>
