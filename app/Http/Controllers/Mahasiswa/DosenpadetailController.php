<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dosen_pa;
use App\Models\Mahasiswa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenpadetailController extends Controller
{
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Mengambil data mahasiswa yang terkait dengan user yang sedang login
        $mahasiswas = Mahasiswa::with(['user', 'dosen_pa'])
            ->where('id_user', $user->id) 
            ->paginate(10);

        // Mengambil semua data dosen_pa
        $dosen_pas = Dosen_pa::all();

        // Melempar data ke view
        return view('mahasiswa/dosenpadetail.index', compact('mahasiswas', 'user', 'dosen_pas',));
}

}
