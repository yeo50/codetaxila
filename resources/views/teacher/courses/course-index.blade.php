<x-app-layout>
    <a href="{{ route('courses.create') }}" class="text-blue-900 block h-20 text-xl font-bold">Create course</a>


    <div class="flex h-56 mt-4">


        <div class="flex-1  gap-2">
            <h1>List Of Topics </h1>
            @foreach ($courses as $course)
                <div x-data="{ open: false }" class=" mt-3">

                    <div @click="open = !open" class="cursor-pointer flex justify-between py-3 bg-blue-500 px-4">
                        <p>{{ $course->topic }}</p>
                        <p>See content</p>
                    </div>

                    <div x-show="open" class="flex">
                        <div class="flex-1  p-4">
                            <h1 class="text-xl font-bold">{{ $course->header ?? '' }}</h1>
                            <p> {{ $course->content }}</p>
                        </div>
                        <div class="flex-1  p-4 bg-black text-[#eee]">
                            {{ $course->example }}
                        </div>

                        <div class="flex flex-col">
                            <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="px-4 py-2 text-red-600">
                            </form>
                            <a href="{{ route('courses.edit', $course->id) }}"
                                class="text-blue-700 text-lg ms-3">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <button class="px-4 py-2 block mx-auto">Mark Finished</button>
        </div>

    </div>
</x-app-layout>
