<?php

namespace App\Exports;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class ExportVehicleUsage implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $data = Vehicle::select('vehicles.name', 
        DB::raw('COUNT(CASE WHEN bookings.status = 0 THEN 1 END) as waiting'),
        DB::raw('COUNT(CASE WHEN bookings.status = 1 THEN 1 END) as accept'),
        DB::raw('COUNT(CASE WHEN bookings.status = 2 THEN 1 END) as decline'))
        ->join('bookings', 'vehicles.id', '=', 'bookings.vehicle_id')
        ->groupBy('vehicles.id')
        ->get();

        return $data;
    }

    public function headings(): array
    {
        return [
            'Vehicle Name',
            'Waiting Booking',
            'Accept Booking',
            'Decline Booking',
        ];
    }

    public function styles($sheet)
{
    return [
        1 => [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFFF00', // Warna kuning
                ]
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'], // Border hitam tipis
                ]
            ]
        ],
    ];
}
}
