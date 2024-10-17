@extends('layouts.master')

@section('sidebar')
    @include('mahasiswa.sidebar-mahasiswa.sidebar')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Mahasiswa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
                <div class="col-12 bg-white rounded mb-4">
                    <p class="p-2 mt-3 dashboard">Selamat Datang, <strong>{{ Auth::user()->name }}</strong></p>
                    
                    

                </div>
            </div>
        </div>

        <div class="container bg-white rounded">

            @foreach ($mahasiswas as $mahasiswa)
                @if ($mahasiswa->perusahaan || $mahasiswa->periode || $mahasiswa->periode_mulai || $mahasiswa->periode_akhir)
                    <div class="row">
                        <div class="col-12 mt-4">
                            <img src="{{ asset('img/simpel-dashboard.png') }}" alt="icon-simpel" width="200px;">
                            <p class="p-2 ">Selamat datang di "Simpel", Sistem Informasi Manajemen PKL. Semua informasi
                                penting terkait kegiatan PKL Anda dapat diakses di sini. Jangan lupa untuk cek status
                                laporan secara berkala. Semangat dan tetap produktif!</p>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12 mt-4">
                            <img src="{{ asset('img/simpel-dashboard.png') }}" alt="icon-simpel" width="200px;">
                            <p class="p-2">Selamat datang di "Simpel", Sistem Informasi Manajemen PKL. Semua informasi
                                penting terkait kegiatan PKL Anda dapat diakses di sini. Jangan lupa untuk cek status
                                laporan secara berkala. Semangat dan tetap produktif!</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-4">
                            <p class="p-2 text-bg-danger">Dimohon untuk Mengisi Data PKL terlebih dahulu pada menu "Data PKL
                                Mahasiswa"</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </main>
@endsection
