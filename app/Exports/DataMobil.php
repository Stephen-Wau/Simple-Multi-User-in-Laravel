<?php


namespace App\Exports;


use App\Models\Car;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class DataMobil implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents
{

    public function headings(): array{
        return [
            [
                'List Mobil Rental'
            ],
            [
                'Bulan',
                '',
                ': '.date('M')
            ],
            [
                'Tanggal Export',
                '',
                ': '.date('d/m/Y')
            ],
            [
                'no',
                'ID Plat',
                'Merek',
                'Warna',
                'Tahun',
                'Harga Sewa',
                'Category ID',
            ]
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event){
                $cellRange = 'A4:G4';
                $styleArray = [
                    'font' => [
                        'bold' => true,
                        'size' => 13,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '00000000']
                        ]
                    ]
                ];

                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);

                #Merger Cell
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->mergeCells('A2:B2');
                $event->sheet->mergeCells('A3:B3');
            }
        ];
    }


    public function collection()
    {
        $data = Car::all();

        $no = 1;
        foreach ($data as $row){
            $collect[] = [
                'no' => $no++,
                'plat' => $row->plat,
                'name' => $row->name,
                'color' => $row->color,
                'years' => $row->years,
                'price' => $row->price,
                'category_id' => $row->category_id,
            ];
        }

        $mobil = collect($collect)->map(function ($dt){
            return (object) $dt;
        });

        return $mobil;
    }

}
