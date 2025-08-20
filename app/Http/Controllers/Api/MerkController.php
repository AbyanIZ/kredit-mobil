<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MerkResource;
use Illuminate\Support\Facades\Auth;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merks = Merk::all();
        return MerkResource::collection($merks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $merk = Merk::create([
            'name' => $request->name,
            'image' => $request->file('image') ? $request->file('image')->store('images/merks', 'public') : null,
        ]);

        return new MerkResource($merk);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $merk = Merk::findOrFail($id);
        return new MerkResource($merk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $merk = Merk::findOrFail($id);
        $merk->name = $request->name;
        if ($request->hasFile('image')) {
            $merk->image = $request->file('image')->store('images/merks', 'public');
        }
        $merk->save();

        return new MerkResource($merk);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();

        return response()->json(['message' => 'Merk deleted successfully'], 200);
    }
}
