<?php

$tabs = ['syntax' => 'Syntax and Selectors', 'rules' => 'Visual Rule', 'box' => 'The Box Model', 'display' => 'Display and Positioning', 'color' => 'Colors', 'typography' => 'Typography'];

?><x-app-layout>
    <x-slot:label>courses</x-slot:label>
    <x-slot:student_year>
        3rd year
    </x-slot>


    <div x-data="{ tab: 'syntax' }">
        <div class="min-h-40 bg-violet-700 flex flex-col items-center justify-center">
            <p class=" w-2/5 text-start text-white font-semibold">Learn CSS</p>
            <h1 class=" text-white text-5xl "
                x-text="tab === 'syntax' ? 'Syntax and Selectors': tab === 'rules'?'Visual Rule':
             tab ==='box'? 'The Box Model': tab ==='display' ? 'Display and Positioning': tab ==='color' ?'Colors': tab ==='typography' ? 'Typography':''">
            </h1>
        </div>

        <div class="flex h-56 mt-4">
            <div class="w-[200px] ">
                <h1 class="my-2">Topics </h1>
                {{-- here loop --}}

                @foreach ($tabs as $key => $value)
                    <div class="flex-1 flex border-black border py-2 cursor-pointer" @click="tab = '{{ $key }}'">
                        <div x-show="tab === '{{ $key }}'" class="block w-2 h-[95%] bg-black ">1</div><span
                            class="ps-1">{{ $value }}
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="flex-1  gap-2">
                @foreach ($courses as $course)
                    <div class="flex mt-3">
                        <div class="flex-1  p-4">{{ $course->content }}</div>
                        <div class="flex-1  p-4 bg-black text-[#eee]">{{ $course->example }}</div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
