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
    public $runningStatus;

    public $testDateOrder;

    protected $listeners = ['test_deleted' => 'render'];

    public function mount()
    {
        $pumpId = request('pump');
        $this->pumpId = $pumpId;
    }

    public function testDateOrderFN()
    {
        $this->testDateOrder = ($this->testDateOrder === 'desc') ? 'asc' : 'desc';
        $this->resetPage();
    }

    public function deletePump($id)
    {
        Test::find($id)->delete();
        $this->dispatch('test_deleted');
    }

    public function applyFilter()
    {
//        dd($this->searchName);
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

        if ($this->searchName && $this->searchName != '') {
            $query->where('name', 'like', '%' . trim($this->searchName) . '%');
        }

        if ($this->selectedMonth && $this->selectedMonth != '') {
            $query->whereMonth('test_date', $this->selectedMonth);
        }

        if ($this->selectedYear && $this->selectedYear != '') {
            $query->whereYear('test_date', $this->selectedYear);
        }

        if ($this->runningStatus && $this->runningStatus != '') {
            $query->where('running_status', $this->runningStatus);
        }

        if ($this->testDateOrder) {
            $query->orderBy('test_date', $this->testDateOrder);
        }

        $tests = $query->paginate(10);

        return view('livewire.pamp.show-test', compact('tests'));
    }
}
