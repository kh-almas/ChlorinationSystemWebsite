<?php

namespace App\Livewire;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $photo;
    public $old_photo;

    public $name;
    public $short_name;
    public $phone_number;
    public $email;
    public $website;
    public $address;

    public function mount()
    {
        $settings = Setting::first();
        if ($settings) {
            $this->name = $settings->name;
            $this->short_name = $settings->short_name;
            $this->phone_number = $settings->phone_number;
            $this->email = $settings->email;
            $this->website = $settings->website;
            $this->address = $settings->address;
            $this->old_photo = $settings->photo;
        }
//        dd($settings->photo);
    }

    public function updateForm()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
            'name' => 'required|string',
            'short_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'website' => 'required|url',
            'address' => 'required|string',
        ]);

        $settingsData = [
            'name' => $this->name,
            'short_name' => $this->short_name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'website' => $this->website,
            'address' => $this->address,
        ];

        if ($this->photo) {
            $file = $this->photo;
            $fileName = $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public');
            $settingsData['photo'] = $fileName;
        }
//        dd($settingsData);

        Setting::updateOrCreate([], $settingsData);

//        $this->reset();
        $this->dispatch('settings_updated');
    }

    public function render()
    {
        return <<<'blade'
        <div>
            <div class="flex justify-center">
                @if ($photo)
                    <img style="width: 120px; height: 120px; border-radius: 8px;" src="{{ $photo->temporaryUrl() }}" alt="img">
                @elseif ($old_photo)
                    <img style="width: 120px; height: 120px; border-radius: 8px;" src="{{ asset('storage/uploads/' . $old_photo) }}" alt="img">
                @endif
            </div>
            <form wire:submit="updateForm" class="mt-6 space-y-6">
                <div class="pump-create-form">
                    <div>
                        <x-input-label for="name" :value="__('Organization Name')" />
                        <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="short_name" :value="__('Organization Short Name')" />
                        <x-text-input wire:model="short_name" id="short_name" name="short_name" type="text" class="mt-1 block w-full" autocomplete="short_name" />
                        <x-input-error class="mt-2" :messages="$errors->get('short_name')" />
                    </div>

                    <div>
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <x-text-input wire:model="phone_number" id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" autocomplete="phone_number" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input wire:model="email" id="email" name="email" type="text" class="mt-1 block w-full" autocomplete="email" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div>
                        <x-input-label for="website" :value="__('Website Address')" />
                        <x-text-input wire:model="website" id="website" name="website" type="url" class="mt-1 block w-full" autocomplete="website" />
                        <x-input-error class="mt-2" :messages="$errors->get('website')" />
                    </div>

                    <div>
                        <x-input-label for="address" :value="__('Organization Address')" />
                        <x-text-input wire:model="address" id="address" name="address" type="text" class="mt-1 block w-full" autocomplete="address" />
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>

                    <div>
                        <x-input-label for="logo" :value="__('Organization Logo')" />
                        <x-text-input wire:model="photo" id="logo" name="logo" type="file" class="mt-1 block w-full" autocomplete="logo" />
                        <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    <x-action-message class="me-3" on="settings_updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </form>
        </div>
        blade;
    }
}
