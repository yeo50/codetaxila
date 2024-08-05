<x-app-layout>

    <x-slot:label>
        grades
    </x-slot>
    <x-slot:student_year>
        3rd year
    </x-slot>

    @if (session('message'))
        <p>{{ session('message') }} this is</p>
    @endif
    @foreach ($grades as $grade)
        <div class="flex justify-between">
            <div>
                <h1>{{ $grade->subject }}</h1>
                <p>{{ $grade->value }}</p>
            </div>
            <div> <a href="{{ route('grades.edit', $grade->id) }}" class="font-semibold text-lg">Edit</a>
                <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="p-4 bg-red-500">
                </form>
            </div>
        </div>
    @endforeach

    <a href="{{ route('grades.create') }}" class="text-xl text-cyan-600">Create Grades</a>


    <h1 class="font-semibold text-lg">Your Grading in Frontend Courses</h1>
    <div class="w-3/5 mx-auto mt-4 bg-slate-300 p-4">
        <div
            class="w-[200px] text-2xl
                 font-bold text-gray-800 mx-auto h-[200px] rounded-full  border-8 border-b-0   border-violet-600 flex items-center justify-center ">
            <span class="z-10">78</span>
        </div>
        <div class="text-center py-2 bg-slate-300 -translate-y-6 font-semibold">Overall Frontend</div>
        <div>
            <div class="flex justify-between w-3/5 mx-auto">
                <p class="font-semibold text-lg">HTML</p>
                <p><span class="font-semibold text-lg">60</span>/70</p>
            </div>
            <div class="w-3/5 bg-slate-500 mt-1 mx-auto rounded-lg">
                <div class="bg-violet-800 w-4/5 text-sm text-violet-800 rounded-lg ">1</div>
            </div>
        </div>
        <div class="mt-1">
            <div class="flex justify-between w-3/5 mx-auto">
                <p class="font-semibold text-lg">CSS</p>
                <p><span class="font-semibold text-lg">80</span>/95</p>
            </div>
            <div class="w-3/5 bg-slate-500 mt-1 mx-auto rounded-lg">
                <div class="bg-violet-800 w-[77%] text-sm text-violet-800 rounded-lg ">1</div>
            </div>
        </div>
        <div class="mt-1">
            <div class="flex justify-between w-3/5 mx-auto">
                <p class="font-semibold text-lg">JavaScript</p>
                <p><span class="font-semibold text-lg">70</span>/100</p>
            </div>
            <div class="w-3/5 bg-slate-500 mt-1 mx-auto rounded-lg">
                <div class="bg-violet-800 w-3/5 text-sm text-violet-800 rounded-lg ">1</div>
            </div>
        </div>
        <h1 class="text-center mt-3">do you need Instructor to improve ?</h1>
    </div>

</x-app-layout>
