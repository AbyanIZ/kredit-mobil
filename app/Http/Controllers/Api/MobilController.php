<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MobilResource;
use App\Models\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /api/mobils
     */
    public function index()
    {
        $mobils = Mobil::with(['merk', 'tipe'])->get();
        return MobilResource::collection($mobils);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'merk_id' => 'required|exists:merks,id',
            'tipe_id' => 'required|exists:tipes,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
            'deskripsi' => 'nullable|string|max:1000',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
            'no_plat' => 'required|string|max:20',
            'warna' => 'nullable|string|max:50',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $mobil = Mobil::create([
            'name' => $request->name,
            'merk_id' => $request->merk_id,
            'tipe_id' => $request->tipe_id,
            'image' => $request->file('image') ? $request->file('image')->store('images/mobil', 'public') : null,
            'harga' => $request->harga,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'no_plat' => $request->no_plat,
            'warna' => $request->warna,
            'tahun' => $request->tahun,
        ]);

        return new MobilResource($mobil);
    }

    /**
     * Display the specified resource.
     * GET /api/mobils/{id}
     */
    public function show(string $id)
    {
        $mobil = Mobil::with(['merk', 'tipe'])->find($id);

        if (!$mobil) {
            return response()->json(['message' => 'Mobil not found'], 404);
        }

        return new MobilResource($mobil);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /api/mobils/{id}
     */
    public function destroy(string $id)
    {
        $mobil = Mobil::find($id);

        if (!$mobil) {
            return response()->json(['message' => 'Mobil not found'], 404);
        }

        $mobil->delete();

        return response()->json(['message' => 'Mobil deleted successfully']);
    }
}
