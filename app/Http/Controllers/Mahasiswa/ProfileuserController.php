<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileuserController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Mengambil data mahasiswa yang terkait dengan user yang sedang login
        $mahasiswas = Mahasiswa::with('user')
            ->where('id_user', $user->id)
            ->first(); // Mengambil satu data mahasiswa terkait

        // Mengirim data user dan mahasiswa ke view menggunakan compact
        return view('mahasiswa/profile_user.edit', compact('user', 'mahasiswas'));
    }

     

    /**
     * Update the user's profile information.
     */
     public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $users = $request->user();

        // Cek apakah ada gambar yang diunggah
    if ($request->hasFile('image')) {

        // Upload gambar baru
        $image = $request->file('image');
        $image->storeAs('public/profile', $image->hashName());

        
        // Simpan nama gambar baru di database
        $users->image = $image->hashName();
    }

        $request->user()->save();

        return Redirect::route('profile.edit_user')->with('success', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
