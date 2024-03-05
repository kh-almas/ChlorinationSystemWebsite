<?php

namespace App\Exports;

use App\Models\Test;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestExportBySearch implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $makeDataJson = $_SESSION['PumpInfoForQuery'];
        $makeDataObject = json_decode($makeDataJson, true);

        $tests = Test::select(
            'pumps.id as pump_id',
            'pumps.name',
            'pumps.source_identification',
            'pumps.location_of_pump',
            'pumps.dma',
            'pumps.zone',
            'pumps.year_of_installation',
            'pumps.depth',
            'pumps.chlorination_unit_condition',
            'pumps.pump_running_condition',
            'tests.running_status',
            'tests.water_production',
            'tests.free_residual_chlorine',
            'tests.total_residual_chlorine',
            'tests.combined_residual_chlorine',
            'tests.test_time',
            'tests.test_date',
            'tests.name as test_name',
            'tests.phone'
        )
            ->join('pumps', 'tests.pump_id', '=', 'pumps.id');

        if (!empty($makeDataObject['selectedPumpName']) || !empty($makeDataObject['selectedZone'])) {
            if (!empty($makeDataObject['selectedPumpName'])) {
                $tests->where('tests.pump_id', $makeDataObject['selectedPumpName']);
            }

            if (!empty($makeDataObject['selectedZone'])) {
                $tests->where('pumps.zone', $makeDataObject['selectedZone']);
            }
        }

        if (!empty($makeDataObject['selectedMonth'])) {
            $tests->whereMonth('test_date', $makeDataObject['selectedMonth']);
        }

//        $tests = $tests->get();

        // Retrieve and return the results
        return $tests->get();
    }

    public function headings(): array
    {
        return ['Pump Id','Pump Name', 'Source Identification', 'Location of Pump', 'DMA', 'Zone', 'Year of Installation', 'Depth', 'Chlorination Unit Condition', 'Pump Running Status', 'Test Running Status', 'Water Production', 'Free Residual Chlorine', 'Total Residual Chlorine', 'Combined Residual Chlorine', 'Test Time', 'Test Date', 'name', 'phone'];
    }
}
