<?php

namespace App\Livewire;

use App\Exports\PumpsExport;
use App\Imports\PumpsImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class PumpExportAndImport extends Component
{
    use WithFileUploads;

    public $file;

    public function uploadPumpData()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        // Your logic for downloading pump data goes here
        Excel::import(new PumpsImport, $this->file);

        $this->dispatch('settings_updated');
    }

    public function downloadPumpData()
    {
        return Excel::download(new PumpsExport, 'pump.xlsx');
    }

    public function render()
    {
        return <<<'blade'
        <div>
            <div class="mt-6 flex flex-col items-center">
                <form wire:submit.prevent="uploadPumpData" enctype="multipart/form-data" class="flex flex-col items-center">
                    <div>
                        <x-input-label for="file" :value="__('Choose Excel File:')" />
                        <x-text-input wire:model="file" id="file" name="file" type="file" class="mt-1 block w-full"/>
                        <x-input-error class="mt-2" :messages="$errors->get('file')" />
                    </div>
                    <div class="flex items-center gap-4 mt-3">
                        <x-primary-button type="submit">{{ __('Import Pump Data') }}</x-primary-button>

                        <x-action-message class="me-3" on="settings_updated">
                            {{ __('Import Completed.') }}
                        </x-action-message>
                    </div>
                </form>
                <div>OR</div>
                <x-primary-button wire:click="downloadPumpData">{{ __('Export Pump Data') }}</x-primary-button>
            </div>
        </div>
        blade;
    }
}
