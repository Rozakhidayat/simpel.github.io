<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = [

        'id_user',
        'nama',
        'nim',
        'kelas',
        'laporanpkl',
        'sertifikat',
        'nilaipkl',
        'status',
        'tanggapan'


    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }


}
