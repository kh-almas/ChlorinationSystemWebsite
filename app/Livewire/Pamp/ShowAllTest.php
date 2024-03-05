<?php

namespace App\Livewire\Pamp;

use App\Exports\TestExportBySearch;
use App\Livewire\PumpExportAndImport;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ShowAllTest extends Component
{
    use WithPagination;
    public $allPump;
    public $allZone;

    public $selectedPumpName;
    public $selectedMonth;
    public $selectedZone;

    public $testDateOrder;

//    public function updatedSelectedPumpName($value)
//    {
////        dd($this->allZone);
//        if(!empty($this->selectedPumpName)){
//             $findZone = DB::table('pumps')
//                 ->select('zone')
//                ->where('id', $value)
//                ->get();
////             dd($findZone);
////            $this->allZone = $findZone;
//            $this->selectedZone = $findZone[0]->zone;
//        }else{
//            $this->allZone = DB::table('pumps')
//                ->select('zone')
//                ->whereIn('id', function ($query) {
//                    $query->select('pump_id')
//                        ->from('tests');
//                })
//                ->orderBy('zone')
//                ->distinct()
//                ->get();
//            $this->selectedZone = '';
//        }
//        $this->resetPage();
//    }


    public function updatedSelectedZone($value)
    {
        if(!empty($this->selectedZone)){
            $this->allPump = DB::table('pumps')
                ->where('zone', $this->selectedZone)
                ->whereIn('id', function ($query) {
                    $query->select('pump_id')->from('tests');
                })
                ->get();
        }else{
            $this->allPump = DB::table('pumps')
                ->whereIn('id', function ($query) {
                    $query->select('pump_id')->from('tests');
                })
                ->get();
        }
        $this->resetPage();
    }
    protected $listeners = ['test_deleted' => 'render'];

    public function mount()
    {
        $this->allPump = DB::table('pumps')
            ->whereIn('id', function ($query) {
                $query->select('pump_id')->from('tests');
            })
            ->get();

        $this->allZone = DB::table('pumps')
            ->select('zone')
            ->whereIn('id', function ($query) {
                $query->select('pump_id')
                    ->from('tests');
            })
            ->orderBy('zone')
            ->distinct()
            ->get();
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
        $this->resetPage();
    }

    public function testReport()
    {
        $makeDataArray = [
            'selectedPumpName' => $this->selectedPumpName,
            'selectedMonth' => $this->selectedMonth,
            'selectedZone' => $this->selectedZone,
        ];
        $makeDataJson = json_encode($makeDataArray);
        $_SESSION['PumpInfoForQuery'] = $makeDataJson;

        // Execute JavaScript to set the object in localStorage
//        $this->dispatchBrowserEvent('storeDataInLocalStorage', ['makeDataJson' => $makeDataJson]);
//        dd($makeDataJson);

//        if(isset($_SESSION['PumpInfoForQuery'])) {
//            // Retrieve the session data
//            $makeDataJson = $_SESSION['PumpInfoForQuery'];
//
//            $makeDataObject = json_decode($makeDataJson, true);
//            dd($makeDataObject);
//        }

        return Excel::download(new TestExportBySearch, 'testBySearch.xlsx');
//        dd($tests);

    }


    public function downloadReport(){

    }

    public function render()
    {
        $tests = Test::query();

        if (!empty($this->selectedPumpName) || !empty($this->selectedZone)) {
            $tests->join('pumps', 'tests.pump_id', '=', 'pumps.id');

            if (!empty($this->selectedPumpName)) {
                $tests->where('tests.pump_id', $this->selectedPumpName);
            }

            if (!empty($this->selectedZone)) {
                $tests->where('pumps.zone', $this->selectedZone);
            }
        }

        if (!empty($this->selectedMonth)) {
            $tests->whereMonth('test_date', $this->selectedMonth);
        }

        $tests = $tests->orderBy('test_date', $this->testDateOrder ?? 'desc')
            ->paginate(10);

        return view('livewire.pamp.show-all-test', compact('tests'));
    }
}
