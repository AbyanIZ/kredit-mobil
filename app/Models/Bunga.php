<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KreditMobil;
use App\Models\User;

class Bunga extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kredit_mobil_id',
        'bunga',
        'tanggal_bayar',
        'total',
        'status',
        'reason',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function kreditMobil() {
        return $this->belongsTo(KreditMobil::class, 'kredit_mobil_id');
    }
}
