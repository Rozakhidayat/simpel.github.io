<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Laporan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanadminController extends Controller
{
    public function index() : View
    {
        //get all laporan
       
        $user = Auth::user(); 
        
        $admin = User::where('role', 'Admin')->first();  
        $laporans= Laporan::latest()->paginate(10);

        //render view with products
        return view('admin/laporanadmin.index', compact('laporans','user','admin'));
    }


    public function edit(string $id): View
    {
     
        $user= Auth::user();
        $laporans = Laporan::findOrFail($id);
        return view('admin/laporanadmin.edit', compact('laporans', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'tanggapan' => 'required|string|',
        
        ]);

        $laporans = Laporan::findOrFail($id);
        $laporans->status = $request->input('status');
        $laporans->tanggapan = $request->input('tanggapan');
        
        $laporans->save();

        return redirect()->route('laporanadmin.index')->with('success', 'Laporan PKL Berhasil Diupdate');
    }

}
