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
    public $installation_year;
    public $pumpCondition;
    public $zoneOrder;
    public $installationYearOrder;

    protected $listeners = ['pump_deleted' => 'render'];

    public function zoneOrderFN()
    {
        $this->zoneOrder = ($this->zoneOrder === 'desc') ? 'asc' : 'desc';
        $this->resetPage();
    }
    public function installationYearOrderFN()
    {
        $this->installationYearOrder = ($this->installationYearOrder === 'desc') ? 'asc' : 'desc';
        $this->resetPage();
    }

    public function deletePump($id)
    {
        Pump::find($id)->delete();

        $this->dispatch('pump_deleted');
    }

    public function applyFilter()
    {
//        dd($this->searchName);
        $this->resetPage();
    }

    public function render()
    {
        $query = Pump::query();

        if ($this->searchName && $this->searchName != '') {
            $query->where('name', 'like', '%' . trim($this->searchName) . '%');
        }

        if ($this->zone && $this->zone != '') {
            $query->where('zone', $this->zone);
        }

        if ($this->installation_year && $this->installation_year != '') {
            $query->where('year_of_installation', $this->installation_year);
        }

        if ($this->pumpCondition && $this->pumpCondition != '') {
            $query->where('pump_running_condition', $this->pumpCondition);
        }

        if ($this->zoneOrder) {
            $query->orderBy('zone', $this->zoneOrder);
        }

        if ($this->installationYearOrder) {
            $query->orderBy('year_of_installation', $this->installationYearOrder);
        }

        $pumps = $query->paginate(10);



        return view('livewire.pamp.show-pump', compact('pumps'));
    }
}
