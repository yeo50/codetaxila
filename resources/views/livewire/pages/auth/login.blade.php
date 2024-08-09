<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <nav x-data="{ link: false, menu: true }" class="flex justify-between px-8 py-3">
        <h1 class="font-semibold text-xl"><span class=" border-black border-2 px-1">code</span>taxila</h1>

        <div>
            @if (Route::has('register'))
                <button @click= " link= !link " x-show="menu"
                    class="bg-blue-700 text-white font-bold tracking-normal px-3 py-2 rounded-md">
                    Register</button>
                <div x-show="link" class="w-26 flex flex-col flex-wrap absolute top-[50px] right-0 bg-[#67D2E0] z-40">
                    <a href="{{ route('register') }}" @click=" link=false ; menu=true"
                        class="rounded-md px-3 py-1 text-black text-lg ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        As Student
                    </a>
                    <a href="{{ route('teacher_register') }}" @click=" link=false ; menu=true"
                        class="rounded-md px-3 py-1 text-black text-lg ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        As Teacher
                    </a>
                </div>
            @endif
        </div>
    </nav>
    <div class="flex">
        <div class="flex-1">

            <img src="./images/code_testing.png" alt="code_testing" class="w-full h-[500px] object-contain">
        </div>
        <div class="flex-1">
            <form wire:submit="login" class="w-3/5 block mx-auto h-[400px] p-4 px-6 mt-5  rounded-lg">
                <!-- Email Address -->
                <h1 class="text-2xl font-semibold text-center mb-6 mt-2"> Log in to Codetaxila</h1>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
                        name="email" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                        name="password" required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember" class="inline-flex items-center">
                        <input wire:model="form.remember" id="remember" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}" wire:navigate>
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
