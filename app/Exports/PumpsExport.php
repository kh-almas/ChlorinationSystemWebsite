<?php

namespace App\Exports;

use App\Models\Pump;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PumpsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pump::select('id','name', 'source_identification', 'location_of_pump', 'dma', 'zone', 'year_of_installation', 'depth', 'chlorination_unit_condition', 'pump_running_condition')->get();
    }

    public function headings(): array
    {
        return ['id','Name', 'Source Identification', 'Location of Pump', 'DMA', 'Zone', 'Year of Installation', 'Depth', 'Chlorination Unit Condition', 'Pump Running Condition'];
    }
}
