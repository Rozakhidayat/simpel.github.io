<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dosen_pa;
use App\Models\Mahasiswa;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DataMahasiswaController extends Controller
{
    public function index()
    {
      $mahasiswas = Mahasiswa::with(['user', 'dosen_pa'])->get();


        $users = User::all();
        $dosen_pas= Dosen_pa::all();
        $user = Auth::user(); 

        
        $admin = User::where('role', 'Admin')->first();  


        return view('admin/data_mahasiswa.index', compact('mahasiswas', 'users','user','dosen_pas','admin'));
        
    }


    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            
            'id_user'         => 'exists:users,id',
            'nim'   => 'required|numeric|unique:mahasiswas,nim',
            'kelas'   => 'required',
            'semester'   => 'required|numeric',
            'jurusan'   => 'required',
            'id_dosen'   => 'exists:dosen_pas,id',
            'perusahaan'   => 'nullable',
            'periode'   => 'nullable',
            'periode_mulai'   => 'nullable|date',
            'periode_akhir'   => 'nullable|date',
            
            
            
        ]);

       
        //create Mahasiswa
        Mahasiswa::create([    
           'id_user'         => $request->id,
            'nim'   => $request->nim,
            'kelas'   => $request->kelas,
            'semester'   => $request->semester,
            'jurusan'   => $request->jurusan,
            'id_dosen'   => $request->id_dosen,
            'perusahaan'   => $request->perusahaan,
            'periode'   => $request->periode,
            'periode_mulai'   => $request->periode_mulai,
            'periode_akhir'   => $request->periode_akhir,
            
        ]);

        //redirect to index wih succes message
        return redirect()->route('data_mahasiswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(string $id): View
    {
        // Mengambil data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::with(['user', 'dosen_pa'])->findOrFail($id);

        // Mengambil semua users dan dosen untuk ditampilkan di view
        $users = User::all();
        $user= Auth::user();
        $dosen_pas = Dosen_pa::all();

        // Render view dengan mahasiswa yang ditemukan
        return view('admin/data_mahasiswa.show', compact('mahasiswa', 'users', 'dosen_pas','user'));
    }

}
