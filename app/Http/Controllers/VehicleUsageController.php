<?php

namespace App\Http\Controllers;

use App\Exports\ExportVehicleUsage;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class VehicleUsageController extends Controller
{
    public function index()
    {
        $data = Vehicle::select('vehicles.name', 
        DB::raw('COUNT(CASE WHEN bookings.status = 0 THEN 1 END) as waiting'),
        DB::raw('COUNT(CASE WHEN bookings.status = 1 THEN 1 END) as accept'),
        DB::raw('COUNT(CASE WHEN bookings.status = 2 THEN 1 END) as decline'))
        ->join('bookings', 'vehicles.id', '=', 'bookings.vehicle_id')
        ->groupBy('vehicles.id')
        ->get();

        return view('vehicle_usage', compact('data'));
    }

    function export_excel()
    {
        return Excel::download(new ExportVehicleUsage,"vehicle_usage.xlsx");
    }
}
