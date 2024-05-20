<nav class=" flex flex-1 justify-end items-center relative" x-data={link:false,menu:true}>
    @auth
        <a href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}"
            class="rounded-md px-3 relative py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Log in
        </a>

        @if (Route::has('register'))
            <button @click= " link= !link " x-show="menu" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Register</button>
            <div x-show="link" class="w-26 flex flex-col flex-wrap absolute top-[50px] right-0 bg-[#67D2E0] z-40">
            <a href="{{ route('register') }}" @click=" link=false ; menu=true"
                class="rounded-md px-3 py-1 text-black text-lg ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                As Student
            </a>
              <a href="{{ route('teacher_register') }}" @click=" link=false ; menu=true"
                class="rounded-md px-3 py-1 text-black text-lg ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                As Teacher
            </a>
            </div>
        @endif
    @endauth
</nav>
