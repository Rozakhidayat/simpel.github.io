<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class LaporanuserController extends Controller
{
    public function index()
    {
          // Mengambil data user yang sedang login
        $user = Auth::user();

        // Mengambil data mahasiswa yang terkait dengan user yang sedang login
        $laporans = Laporan::with('user')
            ->where('id_user', $user->id)
            ->get(); 

        // Mengirim data user dan mahasiswa ke view menggunakan compact
        return view('mahasiswa/laporanuser.index', compact('user', 'laporans'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'nama'         => 'required',
            'nim'          => 'required|numeric',
            'kelas'          => 'required',
            'laporanpkl'   => 'required|mimes:pdf,doc,docx|max:30480',
            'sertifikat'   => 'required|mimes:pdf,doc,docx|max:30480',
            'nilaipkl'     => 'required|mimes:pdf,doc,docx|max:30480',
        ]);

        // Unggah file
        $laporanpkl = $request->file('laporanpkl');
        $sertifikat = $request->file('sertifikat');
        $nilaipkl = $request->file('nilaipkl');

        // Simpan file dengan nama unik untuk menghindari penimpaan
        $laporanpklPath = $laporanpkl->storeAs('public/laporan', uniqid() . '_' . $laporanpkl->getClientOriginalName());
        $sertifikatPath = $sertifikat->storeAs('public/laporan', uniqid() . '_' . $sertifikat->getClientOriginalName());
        $nilaipklPath = $nilaipkl->storeAs('public/laporan', uniqid() . '_' . $nilaipkl->getClientOriginalName());

        // Buat entri Laporan
        Laporan::create([
            'id_user'     => Auth::id(),
            'nama'        => $request->nama,
            'nim'        => $request->nim,
            'kelas'        => $request->kelas,
            'laporanpkl'  => $laporanpklPath,  
            'sertifikat'  => $sertifikatPath,  
            'nilaipkl'    => $nilaipklPath,     
        ]);

        // Redirect ke index
        return redirect()->route('laporanuser.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
     
        $user= Auth::user();
        $laporans = Laporan::findOrFail($id);
        return view('mahasiswa/laporanuser.edit', compact('laporans', 'user'));
    }
   public function update(Request $request, $id)
{
    $request->validate([
        'laporanpkl' => 'nullable|mimes:pdf,doc,docx|max:30480',
        'sertifikat' => 'nullable|mimes:pdf,doc,docx|max:30480',
        'nilaipkl' => 'nullable|mimes:pdf,doc,docx|max:30480',
    ]);

    $laporans = Laporan::findOrFail($id);

    // Proses upload file jika ada
    if ($request->hasFile('laporanpkl')) {
        // Hapus file lama jika ada
        if ($laporans->laporanpkl && Storage::exists($laporans->laporanpkl)) {
            Storage::delete($laporans->laporanpkl);
        }

        $laporanpkl = $request->file('laporanpkl');
        $laporanpklPath = $laporanpkl->storeAs('public/laporan', uniqid() . '_' . $laporanpkl->getClientOriginalName());
        $laporans->laporanpkl = $laporanpklPath;
    }

    if ($request->hasFile('sertifikat')) {
        // Hapus file lama jika ada
        if ($laporans->sertifikat && Storage::exists($laporans->sertifikat)) {
            Storage::delete($laporans->sertifikat);
        }

        $sertifikat = $request->file('sertifikat');
        $sertifikatPath = $sertifikat->storeAs('public/laporan', uniqid() . '_' . $sertifikat->getClientOriginalName());
        $laporans->sertifikat = $sertifikatPath;
    }

    if ($request->hasFile('nilaipkl')) {
        // Hapus file lama jika ada
        if ($laporans->nilaipkl && Storage::exists($laporans->nilaipkl)) {
            Storage::delete($laporans->nilaipkl);
        }

        $nilaipkl = $request->file('nilaipkl');
        $nilaipklPath = $nilaipkl->storeAs('public/laporan', uniqid() . '_' . $nilaipkl->getClientOriginalName());
        $laporans->nilaipkl = $nilaipklPath;
    }

    // Simpan perubahan ke database
    $laporans->save();

    return redirect()->route('laporanuser.index')->with('success', 'Laporan PKL Berhasil Diupdate');
}


}
