<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KreditMobil;

class KreditMobilController extends Controller
{
    public function index()
    {
        $kredits = KreditMobil::with(['mobil.merk', 'mobil.tipe'])->get();
        return view('KreditMobil.index', compact('kredits'));
    }

    public function show($id)
    {
        $kredit = KreditMobil::with(['mobil.merk', 'mobil.tipe'])->findOrFail($id);
        return view('KreditMobil.show', compact('kredit'));
    }

    public function updateStatus(Request $request, $id)
    {
        $kredit = KreditMobil::findOrFail($id);

        if ($request->status === 'done') {
            $kredit->status = 'done';
            $kredit->payment_status  = 'paid';
            $mobil = $kredit->mobil;
            $mobil->status = 'not_available';
            $mobil->save();
        } elseif ($request->status === 'reject') {
            $kredit->status = 'reject';
        }


        $kredit->save();

        return redirect()->route('kreditmobil.index')
            ->with('success', 'Status kredit berhasil diubah ✅');
    }
}
