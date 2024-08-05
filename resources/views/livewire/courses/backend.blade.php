<x-app-layout>
    <x-slot:label>courses</x-slot:label>
    <x-slot:student_year>
        3rd year
    </x-slot>
    <div x-data="{ tab: 'php' }">

        <div class="flex">
            <span class="border p-4 cursor-pointer" @click="tab = 'php'"
                :class="tab === 'php' ? 'border-b-0 border-2' : ''">PHP</span>
            <span class="border p-4 cursor-pointer" @click="tab = 'mysql'"
                :class="tab === 'mysql' ? 'border-b-0 border-2' : ''">MySQL</span>

        </div>
        <div>
            <div x-show="tab === 'php'">

                PHP content
            </div>
            <div x-show="tab === 'mysql'">
                mysql content
            </div>

        </div>
    </div>
</x-app-layout>
