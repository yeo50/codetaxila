<?php

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component
{

    public string $email = '';

     #[Validate('required', as: 'First Name')]
    public string $fname = '';

    #[Validate('required', as: 'Last Name')]
    public string $lname = '';

    public string $dob = '';
    public string $phone = '';
    public string $address = '';
    public string $course_id = '';



    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        if($user->usertype === 1) {
        $student = Student::where('user_id', $user->id)->first();
           if ($student) {
            $this->fname = $student->fname;

            $this->lname = $student->lname;
            $this->dob = $student->dob;
            $this->phone = $student->phone;
            $this->address = $student->address;
        }}
            if($user->usertype === 2) {
        $teacher = Teacher::where('user_id', $user->id)->first();
           if ($teacher) {
            $this->fname = $teacher->fname;
            $this->lname = $teacher->lname;
            $this->dob = $teacher->dob;
            $this->phone = $teacher->phone;
            $this->address = $teacher->address;
            $this->course_id = $teacher->course_id;
            }}
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $this->validate();

        $user = Auth::user();
        if($user->usertype === 1) {
        $student =Student::where('user_id', $user->id)->first();
        $updatestudent = ['fname'=>$this->fname, 'lname'=>$this->lname , 'email'=>$this->email, 'dob'=>$this->dob, 'phone'=>$this->phone, 'address'=>$this->address];
        $student->fill($updatestudent);
        $student->save();
        }
        if($user->usertype === 2) {
        $teacher = Teacher::where('user_id', $user->id)->first();
        $updateteacher = ['fname'=>$this->fname, 'lname'=>$this->lname , 'email'=>$this->email, 'dob'=>$this->dob, 'phone'=>$this->phone, 'address'=>$this->address, 'course_id'=>$this->course_id];
        $teacher->fill($updateteacher);
        $teacher->save();
        }
        $validated = $this->validate([
                   'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $validated['name'] = $this->fname . ' ' .$this->lname ;

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">

         <div>
            <x-input-label for="fname" :value="__('First Name')" />
            <x-text-input wire:model="fname" id="fname" name="fname" type="text" class="mt-1 block w-full"  autofocus autocomplete="fname" />
             <x-input-error class="mt-2" :messages="$errors->get('fname')" />
        </div>
        <div>
            <x-input-label for="lname" :value="__('Last Name')" />
            <x-text-input wire:model="lname" id="lname" name="lname" type="text" class="mt-1 block w-full"  autofocus autocomplete="lname" />
             <x-input-error class="mt-2" :messages="$errors->get('lname')" />
        </div>
         <div>
                <x-input-label for="dob" :value="__('Date of Birth')" />
                <x-text-input wire:model="dob" id="dob" class="inline-block mt-1 w-4/5" type="date"
                    name="dob" autocomplete="dob" />
                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input wire:model="phone" id="phone" class="inline-block mt-1 w-4/5" type="text"
                    name="phone" autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address" :value="__('address')" />
                <x-text-input wire:model="address" id="address" class="inline-block mt-1 w-4/5" type="text"
                    name="address" autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            @if (Auth()->user()->usertype == 2)
            <div>
                <x-selection-label for="course" :value="__('Choose Course')" />
               <x-selection wire:model="course_id" name="course" id="course" />
            </div>
            @endif

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
