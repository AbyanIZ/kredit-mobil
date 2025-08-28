<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Merk;
use App\Models\Tipe;
use Illuminate\Support\Facades\Storage;

class PendataanMobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::with(['merk', 'tipe'])->get();
        return view('pendataanmobil.index', compact('mobils'));
    }

    public function create()
    {
        $merks = Merk::all();
        $tipes = Tipe::all();
        return view('pendataanmobil.create', compact('merks', 'tipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'merk_id' => 'required|exists:merks,id',
            'tipe_id' => 'required|exists:tipes,id',
            'harga' => 'required|numeric',
            'tahun' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();

        // default status mobil baru = available
        $data['status'] = 'available';

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('mobils', 'public');
        }

        Mobil::create($data);

        return redirect()->route('pendataanmobil.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        $merks = Merk::all();
        $tipes = Tipe::all();

        return view('pendataanmobil.edit', compact('mobil', 'merks', 'tipes'));
    }

    public function update(Request $request, $id)
    {
        $mobil = Mobil::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'merk_id' => 'required|exists:merks,id',
            'tipe_id' => 'required|exists:tipes,id',
            'harga' => 'required|numeric',
            'tahun' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($mobil->image && file_exists(storage_path('app/public/' . $mobil->image))) {
                unlink(storage_path('app/public/' . $mobil->image));
            }
            $data['image'] = $request->file('image')->store('mobils', 'public');
        }

        $mobil->update($data);

        return redirect()->route('pendataanmobil.index')->with('success', 'Data mobil berhasil diupdate!');
    }

    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);

        if ($mobil->image) {
            Storage::disk('public')->delete($mobil->image);
        }

        $mobil->delete();

        return redirect()->route('pendataanmobil.index')->with('success', 'Mobil berhasil dihapus!');
    }
}
