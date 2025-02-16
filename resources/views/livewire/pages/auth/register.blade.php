<?php

use App\Models\User;
use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts.guest')] class extends Component {
    use WithFileUploads;

    #[Validate('image|max:11024')]
    public $photo;

    public int $usertype = 1;

    // #[Validate('required')]
    public string $name = '';

    #[Validate('required', as: 'First Name')]
    public string $fname = '';

    #[Validate('required', as: 'Last Name')]
    public string $lname = '';

    public string $dob = '';
    public string $phone = '';
    public string $address = '';

    public string $guardian_name = '';
    public string $guardian_email = '';
    public string $guardian_phone = '';

    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */

    public function register(): void
    {
        $this->validate();
        $validated = $this->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);
        $validated['usertype'] = $this->usertype;
        $validated['name'] = $this->fname . ' ' . $this->lname;
        $photoPath = $this->photo->store('photos', 'public');
        $photoname = basename($photoPath);

        $validated['photo'] = $photoname;
        $validated['password'] = Hash::make($validated['password']);
        $student = ['fname' => $this->fname, 'lname' => $this->lname, 'email' => $this->email, 'dob' => $this->dob, 'phone' => $this->phone, 'address' => $this->address];

        $guardian = ['name' => $this->guardian_name, 'email' => $this->guardian_email, 'phone' => $this->guardian_phone];
        DB::transaction(function () use ($validated, $student, $guardian) {
            $user = User::create($validated);
            $student['user_id'] = $user->id;
            $newstudent = Student::create($student);
            $guardian['student_id'] = $newstudent->id;
            $newguardian = Guardian::create($guardian);

            Auth::login($user);
        });
        // event(new Registered(($user = User::create($validated))));

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>
<div>
    <form wire:submit="register " class="w-4/5 p-4 border shadow-lg mx-auto">
        <h1 class="text-center text-3xl mb-6 mt-4 font-bold">Student Register Form</h1>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
            <x-text-input wire:model="fname" id="fname" class="inline-block mt-1 w-2/5" type="text" name="fname"
                placeholder="First Name" required autofocus autocomplete="fname" />
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
            <x-text-input wire:model="lname" id="lname" class="inline-block mt-1 w-2/5" type="text"
                name="lname" placeholder="Last Name" autofocus autocomplete="lname" />
            <div>
                @error('lname')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="inline-block mt-1 w-4/5" type="email"
                    name="email" placeholder="Enter Your Email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input wire:model="password" id="password" class="inline-block mt-1 w-4/5" type="password"
                    name="password" placeholder="Enter Your Password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input wire:model="password_confirmation" id="password_confirmation"
                    class="inline-block mt-1 w-4/5" type="password" name="password_confirmation"
                    placeholder="Confirm Your Password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="dob" :value="__('Date of Birth')" />
                <x-text-input wire:model="dob" id="dob" class="inline-block mt-1 w-4/5" type="date"
                    name="dob" autocomplete="dob" />
                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input wire:model="phone" id="phone" class="inline-block mt-1 w-4/5" type="text"
                    name="phone" autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="address" :value="__('address')" />
                <x-text-input wire:model="address" id="address" class="inline-block mt-1 w-4/5" type="text"
                    name="address" autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div class="mt-4 space-y-3">
                <label for="photo" class="text-gray-700 font-medium">Upload Photo</label> <br>
                <input type="file" wire:model="photo" id="photo" class="border-gray-300 "> <br>
                @error('photo')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>
            <!-- Parent Information -->
            <div class="mt-4">
                <x-input-label for="guardian_name" :value="__('Guardian Name')" />
                <x-text-input wire:model="guardian_name" id="guardian_name" class="inline-block mt-1 w-4/5"
                    type="text" name="guardian_name" required />
                <x-input-error :messages="$errors->get('guardian_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="guardian_email" :value="__('Guardian Email')" />
                <x-text-input wire:model="guardian_email" id="guardian_email" class="inline-block mt-1 w-4/5"
                    type="email" name="guardian_email" required />
                <x-input-error :messages="$errors->get('guardian_email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="guardian_phone" :value="__('Guardian Phone')" />
                <x-text-input wire:model="guardian_phone" id="guardian_phone" class="inline-block mt-1 w-4/5"
                    type="text" name="guardian_phone" />
                <x-input-error :messages="$errors->get('guardian_phone')" class="mt-2" />
            </div>
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
