<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kredit_id',
        'bulan_ke',
        'jumlah',
        'jatuh_tempo',
        'tanggal_bayar',
        'status',
    ];

    public function kredit()
    {
        return $this->belongsTo(KreditMobil::class, 'kredit_id');
    }

    // 🔹 Helper: apakah sudah lewat jatuh tempo tapi belum bayar
    public function getIsOverdueAttribute()
    {
        return $this->status === 'unpaid' && now()->gt(Carbon::parse($this->jatuh_tempo));
    }

    // 🔹 Helper: format tanggal biar enak ditampilkan
    public function getFormattedJatuhTempoAttribute()
    {
        return Carbon::parse($this->jatuh_tempo)->translatedFormat('d F Y');
    }

    // 🔹 Helper: apakah sudah dibayar
    public function getIsPaidAttribute()
    {
        return $this->status === 'paid';
    }
}
