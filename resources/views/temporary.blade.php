<div>
    <form wire:submit="register " class="w-4/5 p-4">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />


            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
            <x-text-input wire:model="fname" id="fname" class="inline-block mt-1 w-2/5" type="text" name="fname"
                placeholder="First Name" required autofocus autocomplete="fname" />
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
            <x-text-input wire:model="lname" id="lname" class="block mt-1 w-full" type="text" name="lname"
                placeholder="Last Name" autofocus autocomplete="lname" />
            <div>
                @error('lname')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
