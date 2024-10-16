<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Mahasiswa\ProfileuserController;
use App\Http\Controllers\Mahasiswa\DashboarduserController;
use App\Http\Controllers\Mahasiswa\DatapklmahasiswaController;
use App\Http\Controllers\Mahasiswa\DosenpadetailController;
use App\Http\Controllers\Mahasiswa\LaporanuserController;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DataMahasiswaController;
use App\Http\Controllers\Admin\DashboardadminController;
use App\Http\Controllers\Admin\LaporanadminController ;
use App\Http\Controllers\Admin\DosenController;


Route::get('/', function () {
    return view('layouts.master');
})->middleware(['auth', 'verified'])->name('master');



require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
//admin routes
Route::get('/dashboard', [DashboardadminController::class, 'dashboard'])->name('dashboard');
Route::resource('/data_mahasiswa', DataMahasiswaController::class);
Route::resource('/dosen_pa', DosenController::class);
Route::resource('/laporanadmin', LaporanadminController::class);

//profile admin
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
// user routes
Route::get('/dashboarduser', [DashboarduserController::class, 'dashboarduser'])->name('dashboarduser');
Route::resource('/mahasiswapkl', DatapklmahasiswaController::class);
Route::resource('/dosenpadetail', DosenpadetailController::class);
Route::resource('/laporanuser', LaporanuserController::class);

//profile user
Route::get('/profileuser', [ProfileuserController::class, 'edit'])->name('profile.edit_user');
Route::patch('/profileuser', [ProfileuserController::class, 'update'])->name('profile.update_user');
Route::delete('/profileuser', [ProfileuserController::class, 'destroy'])->name('profile.destroy_user');
});



