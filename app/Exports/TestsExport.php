<?php

namespace App\Exports;

use App\Models\Test;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Test::select('pump_id','running_status', 'water_production', 'free_residual_chlorine', 'total_residual_chlorine', 'combined_residual_chlorine', 'test_time', 'test_date', 'name', 'phone')->get();
    }

    public function headings(): array
    {
        return ['Pump Id','Running Status', 'Water Production', 'Free Residual Chlorine', 'Total Residual Chlorine', 'Combined Residual Chlorine', 'Test Time', 'Test Date', 'name', 'phone'];
    }
}
