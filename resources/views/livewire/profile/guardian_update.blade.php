<?php
use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Volt\Component;

new class extends Component {
    public string $guardian_name = '';
    public string $guardian_email = '';
    public string $guardian_phone = '';
    public function mount(): void
    {
        $user = Auth()->user();
        $student = Student::where('user_id', $user->id)->first();
        $guardian = Guardian::where('student_id', $student->id)->first();
        if ($guardian) {
            $this->guardian_name = $guardian->name;
            $this->guardian_email = $guardian->email;
            $this->guardian_phone = $guardian->phone;
        }
    }
    public function updateGuardian(): void
    {
        $user = Auth()->user();
        $student = Student::where('user_id', $user->id)->first();
        $guardian = Guardian::where('student_id', $student->id)->first();
        $updateguardian = ['name' => $this->guardian_name, 'email' => $this->guardian_email, 'phone' => $this->guardian_phone];
        $guardian->fill($updateguardian);
        $guardian->save();
        $this->dispatch('profile-updated', name: $user->name);
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Guardian Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's Guardian information and email address.") }}
        </p>
    </header>
    <form wire:submit="updateGuardian" class="mt-6 space-y-6">
        <div class="mt-4">
            <x-input-label for="guardian_name" :value="__('Guardian Name')" />
            <x-text-input wire:model="guardian_name" id="guardian_name" class="inline-block mt-1 w-4/5" type="text"
                name="guardian_name" required />
            <x-input-error :messages="$errors->get('guardian_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="guardian_email" :value="__('Guardian Email')" />
            <x-text-input wire:model="guardian_email" id="guardian_email" class="inline-block mt-1 w-4/5" type="email"
                name="guardian_email" required />
            <x-input-error :messages="$errors->get('guardian_email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="guardian_phone" :value="__('Guardian Phone')" />
            <x-text-input wire:model="guardian_phone" id="guardian_phone" class="inline-block mt-1 w-4/5" type="text"
                name="guardian_phone" />
            <x-input-error :messages="$errors->get('guardian_phone')" class="mt-2" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
