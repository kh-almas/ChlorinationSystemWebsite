<?php

namespace App\Livewire\Pamp;

use App\Models\Test;
use Livewire\Component;

class AddTestHistory extends Component
{
    public $pumpId;
    public $test_time;
    public $test_date;
    public $name;
    public $phone;

    public $water_production;
    public $free_residual_chlorine;
    public $total_residual_chlorine;
    public $combined_residual_chlorine;
    public $checkbox;

    public function mount($pump)
    {
        $this->pumpId = $pump->id;
    }

    public function calculateCombinedResidualChlorine()
    {
        if ($this->free_residual_chlorine && $this->total_residual_chlorine) {
            $this->combined_residual_chlorine = $this->total_residual_chlorine - $this->free_residual_chlorine;
        }
    }

//    protected $rules = [
//        'test_time' => 'required|string',
//        'test_date' => 'required|date',
//        'name' => 'required|string|max:50',
//        'phone' => 'required|string|max:255',
//        'water_production' => 'number',
//        'free_residual_chlorine' => 'number',
//        'total_residual_chlorine' => 'number',
//        'combined_residual_chlorine' => 'number',
//    ];

    public function submitForm()
    {
//        $this->validate();
//        dd($this->phone);

        Test::updateOrCreate(
            ['name' => $this->name], // Assuming you have an 'id' property for update, adjust accordingly
            [
                'pump_id' => $this->pumpId,
                'running_status' => $this->checkbox == true ? 'Running' : 'Not Running',
                'water_production' => $this->water_production,
                'free_residual_chlorine' => $this->free_residual_chlorine,
                'total_residual_chlorine' => $this->total_residual_chlorine,
                'combined_residual_chlorine' => $this->combined_residual_chlorine,
                'test_time' => $this->test_time,
                'test_date' => $this->test_date,
                'name' => $this->name,
                'phone' => $this->phone,
            ]
        );
        $this->reset();
        $this->dispatch('test_added');

    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="submitForm" class="mb-6">
                    <div class="mb-4">
                        <input wire:model="checkbox" type="checkbox" wire:change="toggleInputs"> Is pump running
                        <x-input-error class="mt-2" :messages="$errors->get('checkbox')" />
                    </div>
                    <div class="add-test-history-one">
                        <div class="mt-3">
                            <x-input-label for="water_production" :value="__('Water Production / minute')" />
                            <x-text-input wire:model="water_production" id="water_production" name="water_production" type="number" class="mt-1 block w-full" :disabled="$checkbox" autofocus autocomplete="water_production"/>
                            <x-input-error class="mt-2" :messages="$errors->get('water_production')" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="free_residual_chlorine"  :value="__('Free Residual Chlorine (mg/l)')" />
                            <x-text-input wire:model="free_residual_chlorine" wire:change="calculateCombinedResidualChlorine" :disabled="$checkbox" id="free_residual_chlorine" name="free_residual_chlorine" type="number" class="mt-1 block w-full" autofocus autocomplete="free_residual_chlorine" />
                            <x-input-error class="mt-2" :messages="$errors->get('free_residual_chlorine')" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="total_residual_chlorine" :value="__('Total Residual Chlorine (mg/l)')" />
                            <x-text-input wire:model="total_residual_chlorine" wire:change="calculateCombinedResidualChlorine" :disabled="$checkbox" id="total_residual_chlorine" name="total_residual_chlorine" type="number" class="mt-1 block w-full" autofocus autocomplete="total_residual_chlorine" />
                            <x-input-error class="mt-2" :messages="$errors->get('total_residual_chlorine')" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="combined_residual_chlorine (mg/l)" :value="__('Combined Residual Chlorine (mg/l)')" />
                            <x-text-input wire:model="combined_residual_chlorine" :disabled="$checkbox" id="combined_residual_chlorine" name="combined_residual_chlorine" type="number" class="mt-1 block w-full" autofocus autocomplete="combined_residual_chlorine" />
                            <x-input-error class="mt-2" :messages="$errors->get('combined_residual_chlorine')" />
                        </div>
                    </div>

                    <div class="add-test-history-two">
                        <div class="mt-3">
                            <x-input-label for="test_time" :value="__('Test Time*')" />
                            <x-text-input wire:model="test_time" id="test_time" name="test_time" type="time" class="mt-1 block w-full" autofocus autocomplete="test_time" />
                            <x-input-error class="mt-2" :messages="$errors->get('test_time')" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="test_date" :value="__('Test Date*')" />
                            <x-text-input wire:model="test_date" id="test_date" name="test_date" type="date" class="mt-1 block w-full" autofocus autocomplete="test_date" />
                            <x-input-error class="mt-2" :messages="$errors->get('test_date')" />
                        </div>
                    </div>

                    <div class="add-test-history-two">
                        <div class="mt-3">
                            <x-input-label for="name" :value="__('Name*')" />
                            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="phone" :value="__('Phone*')" />
                            <x-text-input wire:model="phone" id="phone" name="phone" type="text" class="mt-1 block w-full" autofocus autocomplete="phone" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                    </div>
                    <div class="flex items-center gap-4 mt-3">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        <x-action-message class="me-3" on="test_added">
                            {{ __('Saved.') }}
                        </x-action-message>
                    </div>
                </form>
            </div>
        blade;
    }

    public function toggleInputs()
    {
        if ($this->checkbox) {
            $this->water_production = null;
            $this->free_residual_chlorine = null;
            $this->total_residual_chlorine = null;
            $this->combined_residual_chlorine = null;
        }
    }
}
