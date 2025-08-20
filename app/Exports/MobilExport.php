<?php

namespace App\Exports;

use App\Models\Mobil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MobilExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Mobil::with(['merk','tipe'])->get()->map(function($mobil) {
            return [
                'No' => $mobil->id,
                'Nama' => $mobil->name,
                'Merk' => $mobil->merk->name ?? '-',
                'Tipe' => $mobil->tipe->name ?? '-',
                'Harga' => $mobil->harga,
                'No Plat' => $mobil->no_plat,
                'Tahun' => $mobil->tahun,
            ];
        });
    }

    public function headings(): array
    {
        return ['No','Nama','Merk','Tipe','Harga','No Plat','Tahun'];
    }
}
