<x-guest-layout>
    <x-slot:header>
        @include('partials.header')
    </x-slot:header>
    @include('partials.hero')
    @include('partials.course')
    @include('partials.program')
    <footer class="h-96 w-full"></footer>
</x-guest-layout>
