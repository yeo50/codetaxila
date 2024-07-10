<x-app-layout>
    <x-slot:label>
        assignment
    </x-slot>


    <form action="{{ route('assignments.update', $assignment->id) }}" method="post"
        class="w-4/5 p-4 space-y-2 border shadow-lg mx-auto">
        @csrf
        @method('PATCH')
        <h1 class="text-lg font-bold text-center mb-2">Edit Assignment </h1>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="inline-block mt-1 w-4/5" type="text" value="{{ $assignment->name }}"
                name="name" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="category" :value="__('Category')" />
            <x-text-input id="category" class="inline-block mt-1 w-4/5" type="text"
                value="{{ $assignment->category }}" name="category" autofocus autocomplete="category" />

            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>
        <div>
            <x-primary-button> {{ __('Submit') }} </x-primary-button>
        </div>

    </form>
    <div x-data="{ exerciseForm: false }" class="mt-4">
        <div @click="exerciseForm = !exerciseForm"
            class="cursor-pointer py-2 shadow-lg flex justify-between px-4 w-2/5">
            <h1>Add Exercise to your <span class="font-semibold text-lg">{{ $assignment->name }}</span>
                assignment</h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="#8B56EF" class="h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </div>
        <div x-show="exerciseForm">
            <livewire:exercises.exercise_create id="{{ $assignment->id }}" />
        </div>
    </div>
    <h1 class="p-4">Edit Exercise in <span class="font-bold text-lg">{{ $assignment->name }}</span> Assignment</h1>
    @if (session('message'))
        <p class="text-center text-green-600">{{ session('message') }}</p>
    @endif
    <div>
        <livewire:exercises.exercise_edit id="{{ $assignment->id }}" />
    </div>


</x-app-layout>
