@extends('layouts.master')

@section('sidebar')
    @include('mahasiswa.sidebar-mahasiswa.sidebar')
@endsection

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Laporan PKL</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mahasiswa</li>
                    <li class="breadcrumb-item">Laporan PKL</li>
                    <li class="breadcrumb-item">Detail</li>
                </ol>
            </nav>
        </div>

        <div class="container bg-white p-4 rounded">
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="mb-4"><strong>Detail Laporan PKL</strong></h5>
                    <div class="mb-3">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <div class="row">
                                <div class="col-lg-2 col-md-4 label mb-1 "> <strong>Nama :</strong></div>
                                <div class="col-lg-9 col-md-8">{{ $laporans->nama }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-4 label mb-1"><strong>Nim :</strong> </div>
                                <div class="col-lg-9 col-md-8">{{ $laporans->nim }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-4 label mb-1"><strong>Status :</strong></div>
                                <div class="col-lg-9 col-md-8"> <!-- Laporan Menunggu -->
                                    @if ($laporans->status == 'Menunggu')
                                        <div class="badge" style="background-color: #00488B">
                                            {{ $laporans->status }}
                                        </div>
                                        <!-- Laporan Diproses -->
                                    @elseif ($laporans->status == 'Diproses')
                                        <div class="badge bg-warning">{{ $laporans->status }}</div>

                                        <!-- Laporan Revisi -->
                                    @elseif ($laporans->status == 'Revisi')
                                        <div class="badge bg-danger">{{ $laporans->status }}</div>
                                    @elseif ($laporans->status == 'Diterima')
                                        <div class="badge bg-success">{{ $laporans->status }}</div>
                                    @endif
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-4 label mb-1"><strong>Tanggapan :</strong> </div>
                            <div class="col-lg-9 col-md-8">
                                @if ($laporans->tanggapan == 'Belum ada tanggapan')
                                    <span class="badge bg-danger ms-2">{{ $laporans->tanggapan }}</span>
                                @else
                                    <span class="">{{ $laporans->tanggapan }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if ($laporans->status === 'Diterima' || $laporans->status === "Menunggu" || $laporans->status === "Diproses")
                <div class="d-flex justify-content-start">
                    <a href="{{ route('laporanuser.index') }}" class="btn btn-outline-danger me-3">
                        Kembali
                    </a>
                </div>
            @endif

            @if ($laporans->status === 'Revisi')
                <form action="{{ route('laporanuser.update', $laporans->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Laporan PKL</label>
                        <input type="file" class="form-control" name="laporanpkl"
                            @error('laporanpkl') is-invalid @enderror">
                        @error('laporanpkl')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Sertifikat</label>
                        <input type="file" class="form-control" name="sertifikat"
                            @error('sertifikat') is-invalid @enderror">
                        @error('sertifikat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Nilai PKl</label>
                        <input type="file" class="form-control" name="nilaipkl" @error('nilaipkl') is-invalid @enderror">
                        @error('nilaipkl')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-end">
                        <a href="{{ route('laporanuser.index') }}" class="btn btn-danger me-3">
                            Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                </form>
            @endif
        </div>
    </main>
@endsection
