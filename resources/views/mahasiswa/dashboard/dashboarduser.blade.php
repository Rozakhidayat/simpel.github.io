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

        <div class="container bg-white rounded">
            <div class="row">
                <div class="col-12 mt-4">
                    <img src="{{ asset('img/simpel-dashboard.png') }}" alt="icon-simpel" width="200px;">
                    <p class=" p-2"> Selamat datang di "Simpel", Sistem Informasi Manajemen PKL. Semua informasi penting terkait kegiatan
                        PKL Anda dapat diakses di sini. Jangan lupa untuk cek status laporan secara berkala. Semangat dan
                        tetap produktif!</p>
                </div>
            </div>
        </div>
    @endsection
