<x-app-layout>
    <x-slot:mtitle>
        Dashboard here
    </x-slot>
    <x-slot:label>
        dashboard
    </x-slot>

    <x-slot:header>
        <div class="max-w-7xl mx-auto lg:h-44 py-6 px-4 sm:px-6 lg:px-8 flex-1 flex flex-col gap-6  text-slate-100">
            <span>
                {{ $date }}
            </span>
            <div>
                <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-2">Welcome back,
                    <span>{{ explode(' ', Auth()->user()->name)[0] }}</span>
                </h3>
                <p>Checkout latest info & events here </p>

            </div>
        </div>
        <div class="flex-1  flex justify-center">
            <img src="{{ asset('images/studentbanner.png') }}" class="h-52 w-64" alt="png image from pngtree.com">
        </div>


    </x-slot>

    <div class="flex flex-wrap mt-4 gap-4">
        <div
            class="flex-1 h-60 min-w-52 flex flex-col items-center justify-center border-2 rounded-xl shadow-xl hover:border-violet-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7A3EED"
                class="h-20">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>

            <h4 class="text-lg font-bold">2</h4>
            <h4 class="text-lg font-semibold text-gray-500">Total Course Delivered</h4>

        </div>
        <div
            class="flex-1 h-60 min-w-52 flex flex-col items-center justify-center border-2  rounded-xl shadow-xl hover:border-violet-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="#7A3EED" class="h-20">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
            </svg>

            <h4 class="text-lg font-bold">60</h4>
            <h4 class="text-lg font-semibold text-gray-500">Total Assignment Made</h4>
        </div>
        <div
            class="flex-1 h-60 min-w-52 flex flex-col items-center justify-center border-2 rounded-xl shadow-xl hover:border-violet-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="#7A3EED" class="h-20">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>

            <h4 class="text-lg font-bold">12</h4>
            <h4 class="text-lg font-semibold text-gray-500">Total Student Registered</h4>

        </div>
    </div>


</x-app-layout>
