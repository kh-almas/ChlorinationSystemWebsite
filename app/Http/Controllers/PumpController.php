<?php

namespace App\Http\Controllers;

use App\DataTables\PumpDataTable;
use App\Http\Controllers\Controller;
use App\Models\Pump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PumpController extends Controller
{
    public function getData(Pump $pump)
    {
        return view('updatePump', compact('pump'));
    }

    public function addTestHistory(Pump $pump)
    {
        return view('addTestHistory', compact('pump'));
    }

    public function report(Request $request)
    {
        $testId = $request->input('test');

        $test = DB::table('tests')
            ->join('pumps', 'tests.pump_id', '=', 'pumps.id')
            ->select(
                'tests.id as test_id',
                'tests.name as test_name',
                'tests.phone',
                'tests.running_status as test_running_status',
                'tests.water_production',
                'tests.free_residual_chlorine',
                'tests.total_residual_chlorine',
                'tests.combined_residual_chlorine',
                'tests.test_time',
                'tests.test_date',
                'pumps.name as pump_name',
                'pumps.source_identification',
                'pumps.location_of_pump',
                'pumps.dma',
                'pumps.zone',
                'pumps.year_of_installation',
                'pumps.depth',
                'pumps.chlorination_unit_condition',
                'pumps.pump_running_condition',
            )
            ->where('tests.id', $testId)
            ->first();

//        dd($test);

        return view('report.testReport', compact('test'));
    }
}
