<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pump_id',
        'running_status',
        'water_production',
        'free_residual_chlorine',
        'total_residual_chlorine',
        'combined_residual_chlorine',
        'test_time',
        'test_date',
        'name',
        'phone'
    ];
}
