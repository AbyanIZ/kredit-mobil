<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MobilExport;

class LaporanMobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::with(['merk', 'tipe'])->get();
        return view('laporanmobil.index', compact('mobils'));
    }

    public function export()
    {
        return Excel::download(new MobilExport, 'laporan_mobil.xlsx');
    }
}
