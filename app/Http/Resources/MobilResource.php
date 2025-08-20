<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MobilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'merk' => new MerkResource($this->whenLoaded('merk')),
            'tipe' => new TipeResource($this->whenLoaded('tipe')),
            'image' => $this->image,
            'harga' => $this->harga,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'deskripsi' => $this->deskripsi,
            'tanggal_masuk' => $this->tanggal_masuk,
            'tanggal_keluar' => $this->tanggal_keluar,
            'no_plat' => $this->no_plat,
            'warna' => $this->warna,
            'tahun' => $this->tahun,
        ];
    }
}
