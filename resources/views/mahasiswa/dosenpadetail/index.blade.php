@extends('layouts.master')

@section('sidebar')
    @include('mahasiswa.sidebar-mahasiswa.sidebar')
@endsection

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Dosen PA</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Dosen PA</li>
                </ol>
            </nav>
        </div>

        <div class="container bg-white p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-4 ms-4"><strong>Dosen Penasihat Akademik</strong></h5>
                    @foreach ($mahasiswas as $mahasiswa)
                        <p class="label-detail label-detail-mahasiswa"><strong>Nama:</strong><span
                                class="ms-4">{{ $mahasiswa->dosen_pa->nama }}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>NIP:</strong> <span
                                class="ms-5">{{ $mahasiswa->dosen_pa->nip}}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>Email:</strong> <span
                                class="ms-4">{{ $mahasiswa->dosen_pa->email }}</span>
                        </p>
                        <p class="label-detail label-detail-mahasiswa"><strong>No Hp:</strong> <span
                                class="ms-4">{{ $mahasiswa->dosen_pa->no_hp }}</span></p>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
