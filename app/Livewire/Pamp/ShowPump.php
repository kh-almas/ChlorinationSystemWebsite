<?php

namespace App\Livewire\Pamp;

use App\Models\Pump;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPump extends Component
{
    use WithPagination;

    public function deletePump($id)
    {
        Pump::find($id)->delete();

        $this->dispatch('pump_deleted');
    }

    public function render()
    {
        return view('livewire.pamp.show-pump', [
            'pumps' => Pump::paginate(10),
        ]);
    }
}
