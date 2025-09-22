<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mobil;
use App\Models\Merk;
use App\Models\KreditMobil;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalMobils = Mobil::count();
        $totalMerks = Merk::count();
        $totalKreditMobils = KreditMobil::count();

        return view('dashboard', compact('totalUsers', 'totalMobils', 'totalMerks', 'totalKreditMobils'));
    }
}
