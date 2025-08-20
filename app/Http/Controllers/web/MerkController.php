<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merk;

class MerkController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $mereks = Merk::all();
        return view('merek.index', compact('mereks'));
    }

    // Form tambah
    public function create()
    {
        return view('merek.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only('name');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/merek'), $imageName);
            $data['image'] = $imageName;
        }

        Merk::create($data);

        return redirect()->route('merek.index')->with('success', 'Merek berhasil ditambahkan');
    }

    // Form edit
    public function edit($id)
    {
        $merek = Merk::findOrFail($id);
        return view('merek.edit', compact('merek'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $merek = Merk::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only('name');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/merek'), $imageName);
            $data['image'] = $imageName;
        }

        $merek->update($data);

        return redirect()->route('merek.index')->with('success', 'Merek berhasil diperbarui');
    }

    // Hapus data
    public function destroy($id)
    {
        $merek = Merk::findOrFail($id);

        if ($merek->image && file_exists(public_path('uploads/merek/' . $merek->image))) {
            unlink(public_path('uploads/merek/' . $merek->image));
        }

        $merek->delete();

        return redirect()->route('merek.index')->with('success', 'Merek berhasil dihapus');
    }
}
