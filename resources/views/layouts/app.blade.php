<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased  bg-gray-100">
    <div class="min-h-screen md:flex max-md:relative" x-data="{ sideOpen: false }">
        <div class="max-md:absolute top-20 left-1 right-1 md:flex-0 md:min-w-48  md:block"
            :class="{ 'block': sideOpen, 'hidden': !sideOpen }">

            <livewire:layout.side-navigation :active="$label ?? ''" />

        </div>
        <div class="flex-1 bg-white space-y-4 pt-4 px-4 pe-4">
            <div class="w-full flex justify-between   ">
                <span class="md:hidden" @click="sideOpen = !sideOpen"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                    </svg>
                </span>
                <input type="search" placeholder="Search"
                    class="h-10 border-slate-300 rounded-xl shadow-xl ps-3 w-[30%] focus:shadow-lg focus:shadow-indigo-500">
                <a class="avatar flex items-center gap-1 px-2 " href="{{ route('profile') }}">
                    <img src="{{ Auth::user()->photo ? asset('./storage/photos/' . Auth()->user()->photo) : asset('./storage/photos/ZrMsWtZunO6zI1VonwyYigMv0d8u2UmmZwW6QZ36.jpg') }}"
                        alt="avatar"
                        class="w-12 h-12 rounded-full object-contain border-2 border-violet-700 shadow-lg">
                    <div>
                        <h4>{{ explode(' ', Auth()->user()->name)[0] }}</h4>
                        @if (isset($student_year))
                            <span class="text-slate-400">{{ $student_year }}</span>
                        @endif
                    </div>
                </a>
            </div>


            <!-- Page Heading -->
            @if (request()->routeIs('dashboard') || request()->routeIs('teacherdashboard'))

                @if (isset($header))
                    <header
                        class="bg-gradient-to-r from-indigo-500 to-violet-600 rounded-xl shadow-2xl flex flex-wrap-reverse justify-between">
                        {{ $header }}
                    </header>
                @endif
            @endif
            <!-- Page Content -->
            <main class=" m-0 ">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
