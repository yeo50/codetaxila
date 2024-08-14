<x-app-layout>

    <x-slot:label>
        grades
    </x-slot>
    <x-slot:student_year>
        3rd year
    </x-slot>


    @if (Auth()->user()->student->grades->isNotEmpty())

        <h1 class="font-semibold text-lg">Your Grading in Frontend Courses</h1>
        <div class="w-3/5 mx-auto mt-4 bg-slate-300 p-4">
            <div
                class="w-[200px] text-2xl
                 font-bold text-gray-800 mx-auto h-[200px] rounded-full  border-8 border-b-0   border-violet-600 flex items-center justify-center ">

                {{-- @php
                $grades = Auth()->user()->student->grades->pluck('value')->toArray();
                $total = array_reduce(
                    $grades,
                    function ($carry, $grade) {
                        return $carry * $grade;
                    },
                    0,
                );

            @endphp --}}
                <span
                    class="z-10">{{ ceil(Auth()->user()->student->grades->sum('value') / Auth()->user()->student->grades->count()) }}</span>
            </div>
            <div class="text-center py-2 bg-slate-300 -translate-y-6 font-semibold">Overall Frontend</div>
            @foreach (Auth()->user()->student->grades as $item)
                <div>

                    <div class="flex justify-between w-3/5 mx-auto">
                        <p class="font-semibold text-lg uppercase">{{ $item->subject }}</p>
                        <p><span class="font-semibold text-lg">{{ $item->value }}</span>/100</p>
                    </div>
                    <div class="w-3/5 bg-slate-500 mt-1 mx-auto rounded-lg">
                        <div class="bg-violet-800 w-4/5 text-sm text-violet-800 rounded-lg ">1</div>
                    </div>
                </div>
            @endforeach

            <h1 class="text-center mt-3 cursor-pointer text-blue-700">do you need Instructor to improve ?</h1>
        </div>
    @else
        <div>
            <h1 class="text-red-600 font-semibold"> You haven't score any grade yet.</h1>
        </div>
    @endif
</x-app-layout>
