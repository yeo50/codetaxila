<x-app-layout>
    <x-slot:label>
        assignment
    </x-slot>
    <h1 class="text-2xl font-bold mb-4">Your Assignment </h1>
    <div x-data="{ tab: 'front-end' }">
        <div class="flex justify-between  max-h-14">
            <div class="flex">
                <h3 class="border p-4 cursor-pointer " @click="tab ='front-end'"
                    :class="tab === 'front-end' ? 'border-b-0 border-2' : ''">
                    Front End</h3>
                <h3 class="border  p-4 cursor-pointer " @click="tab ='back-end'"
                    :class="tab === 'back-end' ? 'border-b-0 border-2' : ''">Back
                    End</h3>
            </div>
            <div class="me-4 w-52 ">
                <form action="">
                    <label for="assignment-status" class="inline-block text-lg ">Sort By</label>
                    <select x-on:change="$dispatch('show-status',{status:$event.target.value})" name="status"
                        id="assignment-status" class="inline-block  text-sm">
                        <option value="3">All
                        </option>
                        <option value="1">Completed</option>
                        <option value="0">Ongoing
                        </option>

                    </select>
                </form>
            </div>
        </div>
        <div class="p-4  mt-4 ">
            <div x-show="tab === 'front-end'" class="space-y-4">
                <livewire:assignments.frontend />
            </div>
            <div x-show="tab === 'back-end'">
                backend
            </div>
        </div>
    </div>
</x-app-layout>
