<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KreditMobil extends Model
{
    use HasFactory;

    protected $table = 'kredit_mobil';

    protected $fillable = [
        'mobil_id',
        'user_id',
        'nama',
        'tanggal_kredit',
        'jatoh_tempo', // ⬅️ auto set 1 bulan
        'dp',
        'metode_pembayaran',
        'foto_ktp',
        'foto_kk',
        'status',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
