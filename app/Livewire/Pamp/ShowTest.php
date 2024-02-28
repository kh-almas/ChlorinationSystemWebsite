<?php

namespace App\Livewire\Pamp;

use App\Models\Test;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;

class ShowTest extends Component
{
    use WithPagination;
    public $pumpId;
    public $searchName;
    public $selectedMonth;
    public $selectedYear;
    public $selectedPumpCondition;

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

    public function applyFilter()
    {
        $this->resetPage();
    }

    public function testReport($id)
    {
//        $pdf = Pdf::loadView('report.testReport');
//        return $pdf->download('test-report.pdf', ['Content-Disposition' => 'attachment; filename=test-report.pdf']);
        dd($id);
    }

    public function render()
    {
        $query = Test::where('pump_id', $this->pumpId);

        if ($this->searchName) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        }

        if ($this->selectedMonth) {
            $query->whereMonth('test_date', $this->selectedMonth);
        }

        if ($this->selectedYear) {
            $query->whereYear('test_date', $this->selectedYear);
        }

        if ($this->selectedPumpCondition) {
            $query->where('running_status', $this->selectedPumpCondition);
        }

        $tests = $query->paginate(10);

        return view('livewire.pamp.show-test', compact('tests'));
    }
}
