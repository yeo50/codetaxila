<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public string $active = '';

    public function setActive($set)
    {
        $this->active = $set;
    }
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>
<div
    class="md:fixed top-4 left-0   md:w-44 h-[500px] bg-gradient-to-br from-indigo-400 to-violet-600 flex flex-col items-center  rounded-xl shadow-xl">
    <a href="{{ Auth()->user()->usertype == 1 ? route('dashboard') : route('teacherdashboard') }} " wire:navigate
        class="p-4 bg-violet-900 block mt-6 w-[70%] mx-auto rounded-xl">
        <x-application-logo class="block h-16 mx-auto  w-auto fill-current text-slate-200" />
    </a>

    <ul class="flex flex-col mt-4 items-center space-y-4 text-center font-bold text-lg text-slate-300 ">
        <li class="cursor-pointer w-[95%]  {{ $active === 'dashboard' ? 'side-active' : '' }}  ">
            <a wire:navigate href="{{ Auth()->user()->usertype == 1 ? route('dashboard') : route('teacherdashboard') }}"
                class="hover:text-white"><i class="fa-solid fa-chalkboard me-1 "></i>Dashboard</a>
        </li>
        <li class=" cursor-pointer   {{ $active === 'assignment' ? 'side-active' : '' }}">
            <a wire:navigate
                href="{{ Auth()->user()->usertype == 1 ? route('doAssignment') : route('assignments.create') }}"
                class="flex gap-1 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>
                <span>Assignments</span>
            </a>
        </li>
        <li class=" cursor-pointer w-[95%]  {{ $active === 'courses' ? 'side-active' : '' }}">
            <a wire:navigate
                href="{{ Auth()->user()->usertype == 1 ? route('courses.intro') : route('courses.index') }}"
                class="flex gap-1  hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                <span>Courses</span></a>
        </li>
        <li class=" cursor-pointer w-[95%] {{ $active === 'grades' ? 'side-active' : '' }}">
            <a wire:navigate href="{{ Auth()->user()->usertype == 1 ? route('grades.intro') : route('grades.index') }}"
                class="flex gap-1 hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg><span>Grades</span>
            </a>
        </li>

    </ul>
    <button wire:click="logout" class=" text-center inline-block  mt-[100px]">
        <x-responsive-nav-link class="text-white ">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </button>

</div>
