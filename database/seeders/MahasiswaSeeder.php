<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Password default 'ubsi2024'
        $password = Hash::make('ubsi2024');



       // Daftar nama dan email mahasiswa yang sudah disesuaikan
        $mahasiswas = [
            ['name' => 'Haydar Arfan', 'email' => '12220048@gmail.com'],
            ['name' => 'Siti Aminah', 'email' => '12220049@gmail.com'],
            ['name' => 'Budi Setiawan', 'email' => '12220050@gmail.com'],
            ['name' => 'Rina Hartati', 'email' => '12220051@gmail.com'],
            ['name' => 'Joko Susilo', 'email' => '12220052@gmail.com'],
            ['name' => 'Maya Sari', 'email' => '12220053@gmail.com'],
            ['name' => 'Dian Pratama', 'email' => '12220054@gmail.com'],
            ['name' => 'Rahmat Hidayat', 'email' => '12220055@gmail.com'],
            ['name' => 'Tuti Asri', 'email' => '12220056@gmail.com'],
            ['name' => 'Farhan Ali', 'email' => '12220057@gmail.com'],
            ['name' => 'Jainudin', 'email' => '12220058@gmail.com'],
            ['name' => 'Feli Isabel', 'email' => '12220059@gmail.com'],
            ['name' => 'Handi Irawan', 'email' => '12220060@gmail.com'],
            ['name' => 'Eric Sulistiwa', 'email' => '12220061@gmail.com'],
        ];

        foreach ($mahasiswas as $mahasiswa) {
            User::create([
                'name' => $mahasiswa['name'],  // Nama yang disesuaikan
                'email' => $mahasiswa['email'],
                'password' => $password,
                // Jika menggunakan fitur verifikasi email, tambahkan ini:
                'email_verified_at' => now(),
            ]);
        }
    }
    
}
