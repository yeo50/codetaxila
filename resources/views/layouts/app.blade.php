<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased  bg-gray-100">
    <div class="min-h-screen flex">
        <div class="flex-0 min-w-48 bg-white max-sm:hidden ">

            <livewire:layout.side-navigation />
        </div>
        <div class="flex-1 bg-white space-y-4 pt-4 px-4 pe-4">
            <div class="w-full flex justify-between   ">
                <input type="search" placeholder="Search"
                    class="h-10 border-slate-300 rounded-xl shadow-xl ps-3 w-[30%] focus:shadow-lg focus:shadow-indigo-500">
                <a class="avatar flex items-center gap-1 px-2 " href="{{ route('profile') }}">
                    <img src="{{ asset('./storage/photos/' . Auth()->user()->photo) }}" alt="avatar"
                        class="w-12 h-12 rounded-full object-contain border-2 border-violet-700 shadow-lg">
                    <div>
                        <h4>{{ explode(' ', Auth()->user()->name)[0] }}</h4>
                        <span class="text-slate-400">3rd year</span>
                    </div>
                </a>
            </div>
            {{-- <livewire:layout.navigation :mtitle="$mtitle" /> --}}

            <!-- Page Heading -->
            @if (request()->routeIs('dashboard'))

                @if (isset($header))
                    <header
                        class="bg-gradient-to-r from-indigo-500 to-violet-600 rounded-xl shadow-2xl flex flex-wrap-reverse justify-between">
                        <div
                            class="max-w-7xl mx-auto lg:h-44 py-6 px-4 sm:px-6 lg:px-8 flex-1 flex flex-col gap-6  text-slate-100">
                            <span>
                                {{ $header }}
                            </span>
                            <div>
                                <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-2">Welcome back,
                                    <span>{{ explode(' ', Auth()->user()->name)[0] }}</span>
                                </h3>
                                <p>Checkout latest info & events here </p>
                            </div>
                        </div>
                        <div class="flex-1"></div>
                    </header>
                @endif
            @endif
            <!-- Page Content -->
            <main class="  h-[1500px] w-full ">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
