<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Dosen_pa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DosenController extends Controller
{
     public function index()
    {
        $dosen_pas = Dosen_pa::latest()->paginate(10);

        $users = User::all();

        $user= Auth::user(); 


        return view('admin/dosen_pa.index', compact('dosen_pas','users','user'));
        
    }


    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            
            'nama'   => 'required',
            'nip'   => 'required|numeric|unique:dosen_pas',
            'email'   => 'required',
            'no_hp'   => 'required|numeric' 
            
        ]);

        //create Dosen PA
        Dosen_pa::create([    
            'nama'   => $request->nama,
            'nip'   => $request->nip,
            'email'   => $request->email,
            'no_hp'   => $request->no_hp
            
            
        ]);

        //redirect to index wih succes message
        return redirect()->route('dosen_pa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $dosen_pas = Dosen_pa::findOrFail($id);

        //delete product
        $dosen_pas->delete();

        //redirect to index
        return redirect()->route('dosen_pa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
