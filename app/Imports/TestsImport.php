<?php

namespace App\Imports;

use App\Models\Test;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Test([
            'pump_id' => $row['pump_id'],
            'running_status' => $row['running_status'],
            'water_production' => $row['water_production'],
            'free_residual_chlorine' => $row['free_residual_chlorine'],
            'total_residual_chlorine' => $row['total_residual_chlorine'],
            'combined_residual_chlorine' => $row['combined_residual_chlorine'],
            'test_time' => $row['test_time'],
            'test_date' => $row['test_date'],
            'name' => $row['name'],
            'phone' => $row['phone'],
        ]);
    }
}
