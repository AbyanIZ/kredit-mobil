<?php

namespace App\Exports;

use App\Models\Mobil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Events\AfterSheet;

class MobilExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
{
    public function collection()
    {
        return Mobil::with(['merk', 'tipe'])->get();
    }

    public function headings(): array
    {
        return ['No', 'Nama Mobil', 'Merk', 'Tipe', 'Harga', 'Tahun', 'Status'];
    }

    public function map($mobil): array
    {
        return [
            $mobil->id,
            $mobil->name,
            $mobil->merk->name ?? '-',
            $mobil->tipe->name ?? '-',
            'Rp ' . number_format($mobil->harga, 0, ',', '.'), // Format harga dengan "Rp" dan pemisah ribuan
            $mobil->tahun,
            $mobil->status === 'available' ? 'Tersedia' : 'Tidak Tersedia', // Status dalam bahasa Indonesia
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Gaya untuk header
        $sheet->getStyle('A1:G1')->applyFromArray([
            'font' => [
                'name' => 'Inter',
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF3B82F6'], // Warna biru sesuai tema
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Gaya untuk data
        $highestRow = $sheet->getHighestRow();
        $sheet->getStyle('A2:G' . $highestRow)->applyFromArray([
            'font' => [
                'name' => 'Inter',
                'size' => 11,
                'color' => ['argb' => 'FF1F2937'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FFD1D5DB'],
                ],
            ],
        ]);

        // Gaya khusus untuk kolom Harga
        $sheet->getStyle('E2:E' . $highestRow)->applyFromArray([
            'font' => [
                'color' => ['argb' => 'FF059669'], // Warna hijau untuk harga
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
            ],
        ]);

        // Gaya untuk kolom Status
        $sheet->getStyle('G2:G' . $highestRow)->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Atur tinggi baris header
        $sheet->getRowDimension(1)->setRowHeight(35);

        // Atur tinggi baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(25);
        }

        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                // Alternating row colors
                for ($row = 2; $row <= $highestRow; $row++) {
                    $fillColor = ($row % 2 == 0) ? 'FFF8FAFC' : 'FFF1F5F9';
                    $sheet->getStyle('A' . $row . ':G' . $row)->applyFromArray([
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['argb' => $fillColor],
                        ],
                    ]);
                }

                // Conditional formatting untuk kolom Status
                $conditionalStyles = $sheet->getStyle('G2:G' . $highestRow)->getConditionalStyles();

                // Kondisi untuk "Tersedia"
                $availableCondition = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
                $availableCondition->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CONTAINSTEXT)
                    ->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_CONTAINSTEXT)
                    ->setText('Tersedia')
                    ->getStyle()
                    ->applyFromArray([
                        'font' => [
                            'color' => ['argb' => 'FF166534'],
                        ],
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['argb' => 'FFD4FCE7'],
                        ],
                    ]);

                // Kondisi untuk "Tidak Tersedia"
                $unavailableCondition = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
                $unavailableCondition->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CONTAINSTEXT)
                    ->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_CONTAINSTEXT)
                    ->setText('Tidak Tersedia')
                    ->getStyle()
                    ->applyFromArray([
                        'font' => [
                            'color' => ['argb' => 'FF991B1B'],
                        ],
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['argb' => 'FFFEF2F2'],
                        ],
                    ]);

                $conditionalStyles[] = $availableCondition;
                $conditionalStyles[] = $unavailableCondition;
                $sheet->getStyle('G2:G' . $highestRow)->setConditionalStyles($conditionalStyles);

                // Atur lebar kolom secara manual untuk tampilan lebih rapi
                $sheet->getColumnDimension('A')->setWidth(10); // No
                $sheet->getColumnDimension('B')->setWidth(25); // Nama Mobil
                $sheet->getColumnDimension('C')->setWidth(20); // Merk
                $sheet->getColumnDimension('D')->setWidth(20); // Tipe
                $sheet->getColumnDimension('E')->setWidth(20); // Harga
                $sheet->getColumnDimension('F')->setWidth(15); // Tahun
                $sheet->getColumnDimension('G')->setWidth(15); // Status

                // Membuat tabel Excel
                $sheet->setAutoFilter('A1:G' . $highestRow);
                $sheet->getStyle('A1:G' . $highestRow)->getAlignment()->setWrapText(true);
            },
        ];
    }
}
