<?php

namespace App\Livewire\Pamp;

use App\Models\Test;
use Livewire\Component;

class ShowTest extends Component
{
    public $pumpId;
    public function mount()
    {
        $pumpId = request('pump');
        $this->pumpId = $pumpId;
    }

    public function deletePump($id)
    {
        Test::find($id)->delete();

        $this->dispatch('test_deleted');
    }

    public function render()
    {
        return view('livewire.pamp.show-test', [
            'tests' => Test::where('pump_id', '=',  $this->pumpId)->paginate(10),
        ]);
    }
}
