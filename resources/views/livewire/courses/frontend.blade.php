<x-app-layout>
    <x-slot:label>courses</x-slot:label>
    <x-slot:student_year>
        3rd year
    </x-slot>
    <div x-data="{ tab: 'html' }">

        <div class="flex">
            <span class="border border-black border-r-0 p-4 cursor-pointer" @click="tab = 'html'"
                :class="tab === 'html' ? 'border-b-0 border-2 border-r-2' : ''">HTML</span>
            <span class="border border-black border-r-0 p-4 cursor-pointer" @click="tab = 'css'"
                :class="tab === 'css' ? 'border-b-0 border-2 border-r-2 ' : ''">CSS</span>
            <span class="border border-black  p-4 cursor-pointer" @click="tab ='js' "
                :class="tab === 'js' ? 'border-b-0 border-2' : ''">Javascript</span>
        </div>
        <div>
            <div x-show="tab === 'html'">

                <livewire:courses.learn-html />
            </div>
            <div x-show="tab === 'css'">
                <livewire:courses.learn-css />

            </div>
            <div x-show="tab === 'js'">
                JavaScript content
            </div>
        </div>
    </div>
</x-app-layout>
