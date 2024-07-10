<x-app-layout>
    <x-slot:label>
        assignment
    </x-slot>

    <livewire:assignments.assignment_create />
    <div class="mt-5">
        <h3>Your Assignment Lists</h3>

        @foreach ($assignments as $assignment)
            <div class="flex  justify-between p-4 border shadow-lg rounded-lg cursor-pointer">
                <div class="flex flex-col">
                    <h4 class="font-bold"> {{ $assignment->name }}</h4>
                    <span class="text-slate-500 text-sm">{{ $assignment->category }}</span>
                </div>
                <div>

                    <a href="{{ route('assignments.edit', $assignment->id) }}">
                        <x-primary-button>Edit</x-primary-button></a>
                    <form action="{{ route('assignments.destroy', $assignment->id) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <x-delete-button> Delete </x-delete-button>
                    </form>

                </div>

            </div>
        @endforeach

    </div>
</x-app-layout>
