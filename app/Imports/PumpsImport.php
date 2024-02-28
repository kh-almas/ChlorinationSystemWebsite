<?php

namespace App\Imports;

use App\Models\Pump;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PumpsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pump([
            'id' => $row['id'],
            'name' => $row['name'],
            'source_identification' => $row['source_identification'],
            'location_of_pump' => $row['location_of_pump'],
            'dma' => $row['dma'],
            'zone' => $row['zone'],
            'year_of_installation' => $row['year_of_installation'],
            'depth' => $row['depth'],
            'chlorination_unit_condition' => $row['chlorination_unit_condition'],
            'pump_running_condition' => $row['pump_running_condition'],
        ]);
    }
}
