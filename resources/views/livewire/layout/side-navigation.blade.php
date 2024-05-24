<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>
<div
    class="absolute top-4 left-3 w-44 h-[500px] bg-gradient-to-br from-indigo-400 to-violet-600 flex flex-col space-y-6 rounded-xl">
    <a href="{{ route('dashboard') }}" wire:navigate class="p-4 bg-violet-900 block mt-6 w-[70%] mx-auto rounded-xl">
        <x-application-logo class="block h-16 mx-auto  w-auto fill-current text-slate-200" />
    </a>
    <ul class="flex flex-col space-y-4 text-center font-bold text-lg text-slate-300">
        <li>Dashboard</li>
        <li>Assignment</li>
        <li>Courses</li>
        <li>Result</li>
        <li>Materials</li>
    </ul>
</div>
