<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KreditMobil;
use App\Models\Mobil;
use Illuminate\Http\Request;

class KreditMobilController extends Controller
{
    public function index()
    {
        $data = KreditMobil::with(['mobil', 'user'])->latest()->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'user_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'dp' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|in:dana,gopay,ovo,bca',
            'foto_ktp' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'foto_kk' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $mobil = Mobil::findOrFail($validated['mobil_id']);

        // Cek apakah mobil sudah dikredit
        $existingKredit = KreditMobil::where('mobil_id', $mobil->id)
            ->where('status', 'done')
            ->first();

        if ($existingKredit) {
            if ($existingKredit->user_id == $validated['user_id']) {
                return response()->json(['error' => 'Mobil sudah dikredit oleh Anda'], 400);
            } else {
                return response()->json(['error' => 'Mobil sudah dikredit oleh seseorang'], 400);
            }
        }

        // Cek DP tidak melebihi harga mobil
        if ($validated['dp'] > $mobil->harga) {
            return response()->json(['error' => 'Pembayaran Anda berlebihan'], 400);
        }

        // Simpan file
        $ktpPath = $request->file('foto_ktp')->store('uploads/ktp', 'public');
        $kkPath = $request->file('foto_kk')->store('uploads/kk', 'public');

        // Hitung tanggal kredit & jatuh tempo
        $tanggalKredit = now();
        $jatohTempo = now()->addMonth();

        // Buat kredit dengan status pending
        $kredit = KreditMobil::create([
            'mobil_id' => $mobil->id,
            'user_id' => $validated['user_id'],
            'nama' => $validated['nama'],
            'tanggal_kredit' => $tanggalKredit,
            'jatoh_tempo' => $jatohTempo, // ⬅️ auto set 1 bulan
            'dp' => $validated['dp'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'foto_ktp' => $ktpPath,
            'foto_kk' => $kkPath,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Pengajuan kredit berhasil dikirim ✅',
            'data_baru' => $kredit
        ], 201);
    }


    public function updateStatus(Request $request, $id)
    {
        $kredit = KreditMobil::findOrFail($id);

        if ($request->status === 'done') {
            $kredit->status = 'done';
            $kredit->mobil->status = 'not_available';
            $kredit->mobil->save();
        } elseif ($request->status === 'reject') {
            $kredit->status = 'rejected';
        }

        $kredit->save();

        return response()->json([
            'message' => 'Status kredit berhasil diubah ✅',
            'data' => $kredit
        ]);
    }
}
