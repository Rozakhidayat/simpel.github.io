@extends('layouts.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Mahasiswa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Detail Mahasiswa</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-2 mb-5">
            <div class="row">
                <!-- Kolom untuk gambar -->
                <div class="col-md-4 col-12 ">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/profile/' . $mahasiswa->user->image) }}" class="rounded-circle img-fluid shadow-sm mt-4" alt="Avatar"
                                style="max-height: 150px; width: auto;">
                            <p class="mt-2"><strong>{{ $mahasiswa->nama }}</strong></p>
                            <p class="mt-1">{{ $mahasiswa->nim }}</p>

                        </div>
                    </div>
                </div>

                <!-- Kolom untuk detail mahasiswa dan penempatan PKL -->
                <div class="col-md-8 col-12">
                    <div class="card border-0 shadow-sm rounded ">
                        <div class="card-body ms-3 mt-4">


                            <h5 class="mb-4"><strong>Detail Mahasiswa</strong></h5>
                            <p class="label-detail"><strong>Nama:</strong><span class="ms-3">{{ $mahasiswa->nama }}</span></p>
                            <p class="label-detail"><strong>NIM:</strong> <span class="ms-3">{{ $mahasiswa->nim }}</span></p>
                            <p class="label-detail"><strong>Kelas:</strong> <span class="ms-3">{{ $mahasiswa->kelas }}</span></p>
                            <p class="label-detail"><strong>Semester:</strong> <span class="ms-3">{{ $mahasiswa->semester }}</span></p>
                            <p class="label-detail"><strong>Jurusan:</strong><span class="ms-3"> {{ $mahasiswa->jurusan }}</span></p>
                            <p class="label-detail"><strong>Dosen PA:</strong><span class="ms-3"> {{ $mahasiswa->dosen_pa->nama }}</span></p>
                            <br>

                            <h5 class="mb-4" ><strong>Detail PKL </strong></h5>
                            <p class="label-detail"><strong>Perusahaan:</strong> <span class="ms-3">{{ $mahasiswa->perusahaan }}</span></p>
                            <p class="label-detail"><strong>Periode:</strong><span  class="ms-3">{{ $mahasiswa->periode }}</span></p>
                           
                            <div class="d-flex justify-content-between">
                                <p class="label-detail"><strong>Periode Mulai:</strong> <span class="ms-3"> {{ $mahasiswa->periode_mulai }}</span></p>
                                <p class="label-detail"><strong>Periode Akhir:</strong> <span  class="ms-3">{{ $mahasiswa->periode_akhir }}</span></p>
                            </div>
                            <a href="{{route('data_mahasiswa.index')}}" class="btn btn-outline-primary mt-3">Kembali</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
