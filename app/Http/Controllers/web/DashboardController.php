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
        // Existing counts for stat cards and chart
        $totalUsers = User::count();
        $totalMobils = Mobil::count();
        $totalMerks = Merk::count();
        $totalKreditMobils = KreditMobil::count();

        // Fetch all users with name and role
        $users = User::select('name', 'role')->get();

        // KreditMobil status distribution
        $pendingKredits = KreditMobil::where('status', 'pending')->count();
        $doneKredits = KreditMobil::where('status', 'done')->count();
        $rejectedKredits = KreditMobil::where('status', 'reject')->count();

        return view('dashboard', compact(
            'totalUsers',
            'totalMobils',
            'totalMerks',
            'totalKreditMobils',
            'users',
            'pendingKredits',
            'doneKredits',
            'rejectedKredits'
        ));
    }
}
