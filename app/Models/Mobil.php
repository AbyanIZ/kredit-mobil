<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'merk_id',
        'tipe_id',
        'harga',
        'tahun',
        'image',
        'status',
    ];

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }
    public function pembayaran()
    {
        return $this->hasMany(PembayaranMobil::class, 'mobil_id');
    }
}
