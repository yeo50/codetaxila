<x-app-layout>
    <x-slot:mtitle>
        Dashboard here
    </x-slot>
    <x-slot:label>
        dashboard
    </x-slot>
    <x-slot:student_year>
        3rd year
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

    <div class="flex max-md:flex-col-reverse  gap-3 min-h-screen">
        <section class="flex-1 ">
            <h3 class="text-2xl font-bold">Payment </h3>
            <div class="flex flex-wrap mt-4 gap-4">
                <div
                    class="flex-1 h-60 min-w-52 flex flex-col items-center justify-center border-2 rounded-xl shadow-xl hover:border-violet-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#7A3EED" class="h-20 ">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                    </svg>
                    <h4 class="text-lg font-medium">$1000</h4>
                    <h4 class="text-lg font-semibold text-gray-500">Total Payable</h4>

                </div>
                <div
                    class="flex-1 h-60 min-w-52 flex flex-col items-center justify-center border-2  rounded-xl shadow-xl hover:border-violet-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#7A3EED" class="h-20 ">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                    </svg>
                    <h4 class="text-lg font-medium">$600</h4>
                    <h4 class="text-lg font-semibold text-gray-500">Total Paid</h4>
                </div>
                <div
                    class="flex-1 h-60 min-w-52 flex flex-col items-center justify-center border-2 rounded-xl shadow-xl hover:border-violet-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#7A3EED" class="h-20 ">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                    </svg>
                    <h4 class="text-lg font-medium">$200</h4>
                    <h4 class="text-lg font-semibold text-gray-500">Scholarship</h4>

                </div>
            </div>




            @if (Auth()->user()->student->enroll->count() > 0)
                <h3 class="text-2xl font-bold my-6">Keep Learning</h3>

                <div class="flex  gap-4 max-lg:flex-col max-lg:space-y-4 w-full h-auto">
                    @foreach (Auth()->user()->student->enroll->pluck('course')->unique() as $item)
                        <div class=" flex-1 border border-black rounded-lg">
                            @php
                                $progress_bar = (int) Auth()->user()->student->progress->pluck('value')->implode('');

                            @endphp

                            <div class="flex rounded-lg ">
                                <div class="min-w-10 bg-yellow-500 h-8 rounded-tl-lg flex justify-center items-center"
                                    style="width: {{ $progress_bar }}%">
                                    {{ $progress_bar }} %</div>
                                <div class="flex-1 bg-slate-400 w-full rounded-tr-lg"></div>
                            </div>
                            <div class="py-6 px-4 space-y-2">
                                <h6>Course</h6>
                                <h2 class="text-lg font-medium capitalize">{{ $item }} Development</h2>
                                @if ($item == 'frontend')
                                    <p class="text-gray-600">Learn how to built powerful website
                                        with HTML, CSS, JavaScript.</p>
                                @elseif($item == 'backend')
                                    <p class="text-gray-600">Learn deep understanding of how websites in the background
                                        with PHP, MySQL</p>
                                @endif

                            </div>
                            <div class="flex border-t border-black ">
                                <button class="flex-1 flex justify-center items-center font-semibold">View
                                    Topic</button>
                                <a href="{{ route("courses.$item") }}"
                                    class="flex-1 flex justify-center bg-violet-700 h-12 items-center text-white font-semibold">

                                    Resume
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="h-6 w-6 bg-white text-violet-950 rounded-full ms-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>


                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif
            <h3 class="text-2xl font-bold my-6">Start Enroll Our Courses</h3>

            <div class="flex  gap-4 max-lg:flex-col max-lg:space-y-4 w-full h-auto">

                <a href="{{ route('enrollment', ['course_name' => 'frontend']) }}"
                    class="flex-1 flex max-sm:flex-col-reverse p-4 shadow-xl rounded-xl min-h-60 border-2 hover:border-violet-800">
                    <div class=" flex-1 flex items-center ">
                        <div class="space-y-3">
                            <h6 class="text-lg font-medium">Front End Development</h6>
                            <p class="text-gray-600">Lorem ipsum dolor sit amet celit. Nulla cum
                                placeat harum.</p>
                            <x-primary-button class="max-sm:block max-sm:w-20 max-sm:mx-auto ">Enroll</x-primary-button>
                        </div>
                    </div>
                    <div class=" flex-1 flex items-center justify-center max-sm:max-h-[230px]">
                        <img src="{{ asset('images/frontend.png') }}" alt="frontend"
                            class="object-contain   max-w-full max-h-full">
                    </div>
                </a>


                <a href="{{ route('enrollment', ['course_name' => 'backend']) }}"
                    class="flex-1 flex max-sm:flex-col-reverse p-4 shadow-xl rounded-xl min-h-60 border-2 hover:border-violet-800">
                    <div class=" flex-1 flex items-center">
                        <div class="space-y-3">
                            <h6 class="text-lg font-medium">Back End Development</h6>
                            <p class="text-gray-600">Lorem ipsum dolor sit amet celit. Nulla cum
                                placeat harum.</p>
                            <x-primary-button class="max-sm:block max-sm:w-20 max-sm:mx-auto ">Enroll</x-primary-button>
                        </div>
                    </div>
                    <div class=" flex-1 flex items-center justify-center max-sm:max-h-[230px]">
                        <img src="{{ asset('images/backend.png') }}" alt="png image from pngtree.com"
                            class="object-contain   max-w-full max-h-full">
                    </div>
                </a>

            </div>

        </section>

        <section class="shrink-0 md:w-44 lg:w-64 space-y-4 md:min-h-[450px]">
            <h3 class="text-xl font-bold">Instructors</h3>
            <div class="mt-3 flex flex-wrap ">
                @foreach ($teachers as $teacher)
                    <img src="{{ asset('./storage/photos/' . $teacher->photo) }}" alt="teacher avator"
                        class="w-16 h-16 mx-auto border-2 border-violet-700 rounded-full">
                @endforeach
            </div>
            <div>
                <h5 class="font-semibold text-xl space-y-6">Daily notice</h5>
                <div class="space-y-3 p-4  bg-gray-100 rounded-lg">
                    <div>
                        <h6 class="font-semibold">Weekly assignment due</h6>
                        <p>Lorem ipsum dolor sit um at
                            quia nobis
                            minus molestias! Amet porro, epturi sit sunt
                            commodi?</p>
                    </div>
                    <div>
                        <h6 class="font-semibold">Next Exam Schedule</h6>
                        <p>Lorem ipsum dolor sit um at
                            quia nobis
                            minus molestias! Amet porro, epturi sit sunt
                            commodi?</p>
                    </div>
                </div>
            </div>
        </section>
    </div>


</x-app-layout>
