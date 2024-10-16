<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen_pa;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardadminController extends Controller
{
    public function dashboard()
    {

    // Menghitung total mahasiswa
        $totalMahasiswa = Mahasiswa::count();
        $totaldosenPA = Dosen_pa::count();
        $totalLaporan = Laporan::count();
        $users = User::all();
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login


        $statusCounts = [
        'Menunggu' => Laporan::where('status', 'Menunggu')->count(),
        'Diterima' => Laporan::where('status', 'Diterima')->count(),
        'Diproses' => Laporan::where('status', 'Diproses')->count(),
        'Revisi' => Laporan::where('status', 'Revisi')->count(),
    ];
        return view('admin/dashboard-admin/dashboard', compact('users', 'user','totalMahasiswa','totaldosenPA','statusCounts','totalLaporan'));
    }

}
