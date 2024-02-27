<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public ?string $father_name = null;
    public ?string $birthday = null;
    public ?string $joining_date = null;
    public ?string $religion = null;
    public ?string $blood_group = 'A+';
    public ?string $gander = 'Male';
    public ?string $phone_no = null;
    public ?string $optional_phone_no = null;
    public ?string $present_address = null;
    public ?string $permanent_address = null;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
//        $this->name = Auth::user()->name;
//        $this->email = Auth::user()->email;

        $user = Auth::user();


        $this->name = $user->name;
        $this->email = $user->email;
        $this->father_name = $user->father_name;
        $this->birthday = $user->birthday;
        $this->joining_date = $user->joining_date;
        $this->religion = $user->religion;
        $this->blood_group = $user->blood_group;
        $this->gander = $user->gander;
        $this->phone_no = $user->phone_no;
        $this->optional_phone_no = $user->optional_phone_no;
        $this->present_address = $user->present_address;
        $this->permanent_address = $user->permanent_address;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'father_name' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date'],
            'joining_date' => ['nullable', 'date'],
            'religion' => ['nullable', 'string', 'max:255'],
            'blood_group' => ['nullable', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'gander' => ['nullable', 'in:Male,Female,Other'],
            'phone_no' => ['nullable', 'string', 'max:255'],
            'optional_phone_no' => ['nullable', 'string', 'max:255'],
            'present_address' => ['nullable', 'string', 'max:255'],
            'permanent_address' => ['nullable', 'string', 'max:255'],
        ]);

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
            $this->redirectIntended(default: RouteServiceProvider::HOME);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div class="profile_update_form">
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="father_name" :value="__('Father Name')" />
                <x-text-input wire:model="father_name" id="father_name" name="father_name" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('father_name')" />
            </div>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="profile_update_form_one items-start">
            <div>
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input wire:model="birthday" id="birthday" name="birthday" type="date" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
            </div>

            <div>
                <x-input-label for="joining_date" :value="__('Joining Date')" />
                <x-text-input wire:model="joining_date" id="joining_date" name="joining_date" type="date" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('joining_date')" />
            </div>

            <div>
                <x-input-label for="religion" :value="__('Religion')" />
                <x-text-input wire:model="religion" id="religion" name="religion" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('religion')" />
            </div>

            <div>
                <label for="blood_group" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Blood Group</label>
                <div class="mt-1">
                    <select wire:model="blood_group" id="blood_group" name="blood_group" autocomplete="blood_group" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="gander" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Gender</label>
                <div class="mt-1">
                    <select wire:model="gander" id="gander" name="gander" autocomplete="gander" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="profile_update_form">
            <div>
                <x-input-label for="phone_no" :value="__('Phone Number')" />
                <x-text-input wire:model="phone_no" id="phone_no" name="phone_no" type="text" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('phone_no')" />
            </div>

            <div>
                <x-input-label for="optional_phone_no" :value="__('Optional Phone Number')" />
                <x-text-input wire:model="optional_phone_no" id="optional_phone_no" name="optional_phone_no" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('optional_phone_no')" />
            </div>
        </div>

        <div>
            <x-input-label for="present_address" :value="__('Present Address')" />
            <x-text-input wire:model="present_address" id="present_address" name="present_address" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('present_address')" />
        </div>

        <div>
            <x-input-label for="permanent_address" :value="__('Permanent Address')" />
            <x-text-input wire:model="permanent_address" id="permanent_address" name="permanent_address" type="text" class="mt-1 block w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('permanent_address')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
