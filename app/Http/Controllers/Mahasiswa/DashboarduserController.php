<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboarduserController extends Controller
{
     public function dashboarduser()
    {

    
        $users = User::all();
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        return view('mahasiswa/dashboard/dashboarduser', compact('users', 'user'));
    }


    
    
}
