<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class ExportLogApproval implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Booking::with('Approve.Users','Vehicle')->get();
        $status = ['Waiting','Accept','Decline'];
        return $data->map(function ($item) use ($status){
            return [
                $item->booker_name,
                $item->purpose,
                $item->vehicle->name,
                $item->vehicle_condition,
                $item->date,
                $item->date_end,
                $item->approve[0]->users->name ?? null, // Misalnya untuk approve pertama
                $item->approve[1]->users->name ?? null,
                $status[$item->status], // Misalnya untuk approve kedua
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Booker Name',
            'Purpose',
            'Vehicle',
            'Vehicle Condition',
            'Booking Start',
            'Booking End',
            'Approved By (1)',
            'Approved By (2)',
            'Status',
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
