<?php

namespace App\Livewire\Pamp;

use App\Models\Pump;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPump extends Component
{
    use WithPagination;

    public $searchName;
    public $zone;
    public $installationYear;
    public $pumpCondition;

    protected $listeners = ['pump_deleted' => 'render'];

    public function deletePump($id)
    {
        Pump::find($id)->delete();

        $this->dispatch('pump_deleted');
    }

    public function applyFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Pump::query();

        if ($this->searchName) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        }

        if ($this->zone) {
            $query->where('zone', $this->zone);
        }

        if ($this->installationYear) {
            $query->where('year_of_installation', $this->installationYear);
        }

        if ($this->pumpCondition) {
            $query->where('pump_running_condition', $this->pumpCondition);
        }

        $query->orderBy('zone', 'asc');

        $pumps = $query->paginate(10);

        return view('livewire.pamp.show-pump', compact('pumps'));
    }
}
