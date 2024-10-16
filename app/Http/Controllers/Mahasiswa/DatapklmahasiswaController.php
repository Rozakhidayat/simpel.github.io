<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dosen_pa;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatapklmahasiswaController extends Controller
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
        return view('mahasiswa/datapklmahasiswa.index', compact('mahasiswas', 'user', 'dosen_pas',));
}



public function update(Request $request, $id)
{
    $request->validate([
        'perusahaan' => 'required|string|max:255',
        'periode' => 'required|string|max:255',
        'periode_mulai' => 'required|date',
        'periode_akhir' => 'required|date',
    ]);

    $mahasiswa = Mahasiswa::findOrFail($id);
    $mahasiswa->perusahaan = $request->input('perusahaan');
    $mahasiswa->periode = $request->input('periode');
    $mahasiswa->periode_mulai = $request->input('periode_mulai');
    $mahasiswa->periode_akhir = $request->input('periode_akhir');
    $mahasiswa->save();

    return redirect()->route('mahasiswapkl.index')->with('success', 'Detail PKL berhasil diupdate');
}


}
