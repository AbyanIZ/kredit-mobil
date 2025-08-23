<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\KreditMobil;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BungaController extends Controller
{
    public function index() {

    }

    public function checkOverdue() {
        $monthly = Carbon::now()->subMonth();

        $kredit = KreditMobil::where("status", "unpaid")
            ->where("tanggal_kredit", "<=", $monthly)
    }
}
