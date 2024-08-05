<x-app-layout>
    <x-slot:label>courses</x-slot:label>
    <x-slot:student_year>
        3rd year
    </x-slot>
    <h1 class="text-xl font-semibold text-gray-700">Welcome <span
            class="font-bold text-[#4C1D95]">{{ Auth()->user()->name }}</span></h1>
    <div class="mt-4">
        <h2 class="ps-4">Start Learning Our Courses</h2>
        {{-- test area --}}
        {{-- <div>
            {{ array_filter(Auth()->user()->student->enroll->pluck('course')->unique()->values()->toArray(), function (
                $value,
            ) {
                return $value == 'frontend';
            }) }}
        </div> --}}
        @php
            $enroll = Auth()->user()->student->enroll->pluck('course')->unique()->values()->toArray();
            $frontend = implode(
                '',
                array_filter($enroll, function ($value) {
                    return $value == 'frontend';
                }),
            );
            $backend = implode(
                '',
                array_filter($enroll, function ($value) {
                    return $value == 'backend';
                }),
            );

        @endphp



        <div class="flex flex-wrap max-md:flex-col gap-3 p-4 ">
            <a href="{{ $frontend ? route('courses.frontend') : route('enrollment', ['course_name' => 'frontend']) }}"
                class="block flex-1 px-4">
                <div
                    class="flex flex-col px-4 border border-[#7F5EF2] rounded-md hover:reverse-shadow hover:translate-x-3 hover:-translate-y-2 transition duration-200  flex-1 relative">
                    <h4 class="text-lg  py-2 px-2 bg-gray-100">Frontend Courses </h4>
                    <div class="ps-2 py-2 min-h-32 text-wrap">
                        <h6 class="text-xl text-violet-800 font-bold">Learn HTML, CSS, JavaScript</h6>
                        <p>Learn how to built powerful website
                            with HTML, CSS, JavaScript.
                        </p>
                    </div>
                    <div
                        class="px-2 border-t-2 max-h-20 border-dashed border-gray-600 py-2 mx-auto flex justify-between  w-[95%]">
                        <span class="font-semibold">Beginner Friendly</span>
                        <span>19 hours</span>
                    </div>
                </div>
            </a>
            <a href="{{ $backend ? route('courses.backend') : route('enrollment', ['course_name' => 'backend']) }}"
                class="block  flex-1 px-4  ">
                <div
                    class="flex flex-col px-4  border border-[#7F5EF2] rounded-md hover:reverse-shadow hover:translate-x-3 hover:-translate-y-2 transition duration-200  flex-1 relative">
                    <h4 class="text-lg flex-1  py-2 px-2 bg-gray-100">Backend Courses</h4>
                    <div class="ps-2 py-2 min-h-32 text-wrap">
                        <h6 class="text-xl text-violet-800 font-bold">Learn PHP, MySQL</h6>
                        <p>Learn deep understanding of how websites in the background with PHP, MySQL</p>
                    </div>
                    <div
                        class="px-2  border-t-2 max-h-20 border-dashed border-gray-600 py-2 mx-auto flex justify-between  w-[95%]">
                        <span class="font-semibold">Beginner Friendly</span>
                        <span>32 hours</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div>
        <h2 class="font-semibold text-lg">Work toward your goal</h2>
        <h4>Your Course</h4>
        <div
            class=" mx-auto w-[60%] mt-4 rounded-xl border border-violet-700 hover:reverse-shadow hover:translate-x-2 hover:-translate-y-2 transition duration-300 p-4  flex flex-col justify-center  items-center">
            <div class="block mx-auto w-full ">
                <h6 class="text-center ">Progress</h6>
                <div class="flex mt-5 h-2 w-full justify-between relative">
                    <div class="flex-1"></div>
                    <div class="flex flex-1 relative">
                        <div
                            class="h-6 w-6 rounded-full border border-violet-700 bg-violet-700 absolute -top-2 start-0">

                        </div>
                        <div class="h-2 w-full bg-violet-700"></div>
                    </div>
                    <div class="flex flex-1 relative">
                        <div
                            class="h-6 w-6 rounded-full border border-violet-700
                           bg-violet-700 absolute -top-2 start-0">

                        </div>
                        <div class="h-2 w-full bg-gray-400"></div>

                    </div>
                    <div class="flex flex-1 relative">
                        <div class="h-6 w-6 rounded-full   bg-gray-400 absolute -top-2 start-0">

                        </div>
                    </div>
                </div>
                <div class="w-full mt-2 flex">
                    <span class="flex-1"></span>
                    <span class="flex-1 text-sm">HTML</span>
                    <span class="flex-1 text-sm">CSS</span>
                    <span class="flex-1 text-sm">JavaScript</span>
                </div>
                <div class="mt-4">
                    <p class="text-gray-700">1 subject left to finished Frontend Course</p>
                    <x-primary-button>start learning today</x-primary-button>
                </div>
            </div>

        </div>
    </div>
    <div class="mt-4 py-4">
        <h3 class="p-2 m-2 text-lg font-semibold">Upcoming Courses</h3>
        <div class="flex flex-wrap gap-3">
            <div
                class="flex flex-1 hover:reverse-shadow hover:translate-x-1 hover:-translate-y-1 border border-violet-700 p-3 transition duration-200">
                <div class="px-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-bold">Computer Science</h5>
                    <p>Looking for an introduction to the theory behind programming?</p>
                </div>
                <div class="flex items-center px-2">
                    <h1 class="text-3xl">&gt;</h1>
                </div>
            </div>
            <div
                class="flex flex-1 hover:reverse-shadow hover:translate-x-1 hover:-translate-y-1 border border-violet-700 p-3 transition duration-200">
                <div class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 15a4.5 4.5 0 0 0 4.5 4.5H18a3.75 3.75 0 0 0 1.332-7.257 3 3 0 0 0-3.758-3.848 5.25 5.25 0 0 0-10.233 2.33A4.502 4.502 0 0 0 2.25 15Z" />
                    </svg>

                </div>
                <div>
                    <h5 class="font-bold">Cloud Computing</h5>
                    <p>Looking for an introduction to the theory behind programming?</p>
                </div>
                <div class="flex items-center px-2">
                    <h1 class="text-3xl">&gt;</h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
