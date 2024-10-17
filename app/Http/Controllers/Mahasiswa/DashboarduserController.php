<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboarduserController extends Controller
{
    public function dashboarduser()
{
    $user = Auth::user(); // Mendapatkan pengguna yang sedang login
    $mahasiswas = Mahasiswa::where('id_user', $user->id)->get();

    return view('mahasiswa/dashboard/dashboarduser', compact('user', 'mahasiswas'));
}



    
    
}
