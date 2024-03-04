<?php

namespace App\Livewire\Pamp;

use App\Models\Pump;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{

    public string $name = '';
    public string $source_identification = 'Single';
    public string $location = '';
    public string $dma = '';
    public string $zone = 'Zone-1';
    public string $installation_year = '1970';
    public string $depth = '';
    public string $chlorination = 'Running';
    public string $pumpcondition = 'Running';

    protected $rules = [
        'name' => 'required|string|max:255',
        'source_identification' => 'required|in:Single,Duel',
        'location' => 'required|string|max:255',
        'dma' => 'required|string|max:255',
        'zone' => 'required|string|in:Zone-1,Zone-2,Zone-3,Zone-4,Zone-5,Zone-6,Zone-7,Zone-8,Zone-9,Zone-10',
        'installation_year' => 'required|integer|min:1970',
        'depth' => 'required|string|max:255',
        'chlorination' => 'required|in:Running,Not running',
        'pumpcondition' => 'required|in:Running,Not running',
    ];


    public function updateProfileInformation() {
//        logger('name: '.$this->name);
//        logger('source_identification: '. $this->source_identification);
//        logger('location: '.  $this->location);
//        logger('dma: '. $this->dma);
//        logger('zone: '. $this->zone);
//        logger('installation_year: '. $this->installation_year);
//        logger('depth: '. $this->depth);
//        logger('chlorination: '. $this->chlorination);
//        logger('pumpCondition: '. $this->pumpcondition);

        $this->validate();

        Pump::updateOrCreate(
            ['name' => $this->name], // Assuming you have an 'id' property for update, adjust accordingly
            [
                'name' => $this->name,
                'source_identification' => $this->source_identification,
                'location_of_pump' => $this->location,
                'dma' => $this->dma,
                'zone' => $this->zone,
                'year_of_installation' => $this->installation_year,
                'depth' => $this->depth,
                'chlorination_unit_condition' => $this->chlorination,
                'pump_running_condition' => $this->pumpcondition,
            ]
        );
        $this->reset();
        $this->dispatch('pump_added');

    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
                    <div class="pump-create-form">
                        <div>
                            <x-input-label for="name" :value="__('Pump Name')" />
                            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full"   autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                          <label for="source_identification" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Source Identification</label>
                          <div class="mt-1">
                            <select wire:model="source_identification" id="country" name="country" autocomplete="country-name" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                              <option value="Single">Single</option>
                              <option value="Duel">Duel</option>
                            </select>
                          </div>
                        </div>

                        <div>
                            <x-input-label for="location" :value="__('Location of Pump House')" />
                            <x-text-input wire:model="location" id="location" name="location" type="text" class="mt-1 block w-full"   autofocus autocomplete="location" />
                            <x-input-error class="mt-2" :messages="$errors->get('location')" />
                        </div>

                        <div>
                            <x-input-label for="dma" :value="__('DMA')" />
                            <x-text-input wire:model="dma" id="dma" name="dma" type="text" class="mt-1 block w-full"   autofocus autocomplete="dma" />
                            <x-input-error class="mt-2" :messages="$errors->get('dma')" />
                        </div>

                        <div>
                          <label for="zone" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Zone</label>
                          <div class="mt-1">
                            <select wire:model="zone" id="zone" name="zone" autocomplete="zone" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                              <option value="Zone-1">Zone-1</option>
                              <option value="Zone-2">Zone-2</option>
                              <option value="Zone-3">Zone-3</option>
                              <option value="Zone-4">Zone-4</option>
                              <option value="Zone-5">Zone-5</option>
                              <option value="Zone-6">Zone-6</option>
                              <option value="Zone-7">Zone-7</option>
                              <option value="Zone-8">Zone-8</option>
                              <option value="Zone-9">Zone-9</option>
                              <option value="Zone-10">Zone-10</option>
                            </select>
                          </div>
                        </div>

                        <div>
                            <label for="installation-year" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Year of Installation</label>
                            <div class="mt-1">
                                <select wire:model="installation_year" id="installation-year" name="installation-year" autocomplete="installation-year" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    @for($year = date("Y"); $year >= 1970; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div>
                            <x-input-label for="depth" :value="__('Depth(ft)')" />
                            <x-text-input wire:model="depth" id="name" name="depth" type="text" class="mt-1 block w-full"   autofocus autocomplete="depth" />
                            <x-input-error class="mt-2" :messages="$errors->get('depth')" />
                        </div>

                        <div>
                          <label for="chlorination" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Chlorination Unit Running Condition</label>
                          <div class="mt-1">
                            <select wire:model="chlorination" id="chlorination" name="chlorination" autocomplete="chlorination" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                              <option value="Running">Running</option>
                              <option value="Not running">Not running</option>
                            </select>
                          </div>
                        </div>

                        <div>
                          <label for="pumpcondition" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Pump Running Condition</label>
                          <div class="mt-1">
                            <select id="pumpcondition" name="pumpcondition" autocomplete="pumpcondition" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                              <option value="Running">Running</option>
                              <option value="Not running">Not running</option>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        <x-action-message class="me-3" on="pump_added">
                            {{ __('Saved.') }}
                        </x-action-message>
                    </div>
                </form>
            </div>
        blade;
    }
}
