<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'source_identification',
        'location_of_pump',
        'dma',
        'zone',
        'year_of_installation',
        'depth',
        'chlorination_unit_condition',
        'pump_running_condition'
    ];
}
