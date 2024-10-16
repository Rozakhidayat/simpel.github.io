<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen_pa extends Model
{
    use HasFactory;

    protected $table = 'dosen_pas';
    protected $fillable = [
        'id',
        'nama',
        'nip',
        'email',
        'no_hp'
        
    ];

     public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
