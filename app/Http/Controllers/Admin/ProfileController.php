<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin/profile.edit', [
            'user' => $request->user(),
        ]);
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

        return Redirect::route('profile.edit')->with('success', 'profile-updated');
    }

}
