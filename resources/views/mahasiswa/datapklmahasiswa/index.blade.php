@extends('layouts.master')

@section('sidebar')
    @include('mahasiswa.sidebar-mahasiswa.sidebar')
@endsection

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data PKL Mahasiswa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Data PKL Mahasiswa</li>
                </ol>
            </nav>
        </div>

        <div class="container bg-white p-3 rounded"> <!-- Menggunakan container untuk memperkecil ukuran -->
            <div class="row">
                <div class="col-md-12">
                    <h5 class="mb-4 ms-4"><strong>Detail Mahasiswa</strong></h5>
                    @foreach ($mahasiswas as $mahasiswa)
                        <p class="label-detail label-detail-mahasiswa"><strong>Nama:</strong><span
                                class="ms-3">{{ $mahasiswa->nama }}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>NIM:</strong> <span
                                class="ms-3">{{ $mahasiswa->nim }}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>Kelas:</strong> <span
                                class="ms-3">{{ $mahasiswa->kelas }}</span>
                        </p>
                        <p class="label-detail label-detail-mahasiswa"><strong>Semester:</strong> <span
                                class="ms-3">{{ $mahasiswa->semester }}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>Jurusan:</strong><span
                                class="ms-3">{{ $mahasiswa->jurusan }}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>Dosen PA:</strong><span
                                class="ms-3">{{ $mahasiswa->dosen_pa->nama }}</span></p>
                        <br>
                    @endforeach

                    @if ($mahasiswa->perusahaan || $mahasiswa->periode || $mahasiswa->periode_mulai || $mahasiswa->periode_akhir)
                        <h5 class="mb-4 ms-4"><strong>Detail PKL</strong></h5>
                        <p class="label-detail label-detail-mahasiswa"><strong>Perusahaan:</strong> <span
                                class="ms-3">{{ $mahasiswa->perusahaan }}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>Periode:</strong> <span
                                class="ms-3">{{ $mahasiswa->periode }}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>Periode Mulai:</strong> <span
                                class="ms-3">{{ $mahasiswa->periode_mulai }}</span></p>
                        <p class="label-detail label-detail-mahasiswa"><strong>Periode Akhir:</strong> <span
                                class="ms-3">{{ $mahasiswa->periode_akhir }}</span></p>
                    @else
                        <form action="{{ route('mahasiswapkl.update', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h5 class="mb-4 ms-4"><strong>Detail PKL</strong></h5>
                            <div class="form-group mb-3 row">
                                <label class="col-md-1 font-weight-bold label-detail-mahasiswa">Perusahaan</label>
                                <div class="col-md-10 ms-3">
                                    <input type="text" class="form-control" name="perusahaan"
                                        placeholder="Masukkan perusahaan anda" @error('perusahaan') is-invalid @enderror>
                                    @error('perusahaan')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="col-md-1 font-weight-bold  label-detail-mahasiswa">Periode</label>
                                <div class="col-md-10 ms-3">
                                    <input type="text" class="form-control" name="periode"
                                        placeholder="Masukkan periode anda contoh 3 bulan"
                                        @error('periode') is-invalid @enderror>
                                    @error('periode')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label
                                    class="col-md-2 font-weight-bold label-detail-mahasiswa-periode align-self-center">Periode
                                    Mulai</label>
                                <div class="col-md-2">
                                    <input type="date" class="form-control" name="periode_mulai"
                                        @error('periode_mulai') is-invalid @enderror>
                                    @error('periode_mulai')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label class="col-md-2 font-weight-bold align-self-center">Periode Akhir</label>
                                <div class="col-md-2">
                                    <input type="date" class="form-control" name="periode_akhir"
                                        @error('periode_akhir') is-invalid @enderror>
                                    @error('periode_akhir')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-5 mt-2 float-end"><i
                                    class="fa fa-save p-1"></i>Simpan</button>
                            <a href="{{ route('dashboarduser') }}"
                                class="btn btn-danger me-3 mt-2 float-end">Kembali</a>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
