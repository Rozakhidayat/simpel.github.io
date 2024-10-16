<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $fillable = [
        'id',
        'id_user',
        'nim',
        'kelas',
        'semester',
        'jurusan',
        'id_dosen',
        'perusahaan',
        'periode',
        'periode_mulai',
        'periode_akhir'

    ];

    // dapatkan nama user
    public function getNamaAttribute()
    {
        return $this->user->name;
    }

    //dapatkan nama dosen_pa

    public function getNamaDosenAttribute()
    {
        return $this->dosen_pa->nama;
    }


    //  public function getImageDosenAttribute()
    // {
    //     return $this->user->image;
    // }



     public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }


    public function dosen_pa()
    {
        return $this->belongsTo(Dosen_pa::class,'id_dosen');
    }

}
