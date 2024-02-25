<?php

namespace App\Http\Controllers;

use App\DataTables\PumpDataTable;
use App\Http\Controllers\Controller;
use App\Models\Pump;
use Illuminate\Http\Request;

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
}
