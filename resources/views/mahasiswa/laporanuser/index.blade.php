@extends('layouts.master')

@section('sidebar')
    @include('mahasiswa.sidebar-mahasiswa.sidebar')
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Laporan PKl</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Laporan PKL Mahasiswa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-success"
                                    style="margin-right: 250px; position: relative; top: 46px;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="bi bi-plus p-1"></i>Tambah
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nim</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporans as $laporan)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $laporan->nama }}</td>
                                                <td class="align-middle">{{ $laporan->nim }}</td>
                                                <td class="align-middle">{{ $laporan->kelas }}</td>
                                                <td class=" align-middle">
                                                    <!-- Laporan Menunggu -->
                                                    @if ($laporan->status == 'Menunggu')
                                                        <div class="badge" style="background-color: #00488B">
                                                            {{ $laporan->status }}
                                                        </div>
                                                        <!-- Laporan Diproses -->
                                                    @elseif ($laporan->status == 'Diproses')
                                                        <div class="badge bg-warning">{{ $laporan->status }}</div>

                                                        <!-- Laporan Revisi -->
                                                    @elseif ($laporan->status == 'Revisi')
                                                        <div class="badge bg-danger">{{ $laporan->status }}</div>
                                                    @elseif ($laporan->status == 'Diterima')
                                                        <div class="badge bg-success">{{ $laporan->status }}</div>
                                                    @endif

                                                </td>



                                                <td class="align-middle">
                                                    <a href="{{ route('laporanuser.edit', $laporan->id) }}"
                                                        class="btn btn-sm btn-outline-primary"><i
                                                            class="bi bi-eye p-1"></i>Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
        </section>

    </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Menambahkan modal-dialog-centered -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Laporan PKL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laporanuser.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama"
                                @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">NIM</label>
                            <input type="text" class="form-control" name="nim" placeholder="Masukan Nim Anda"
                                @error('nim') is-invalid @enderror">
                            @error('nim')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Kelas</label>
                            <input type="text" class="form-control" name="kelas" placeholder="Masukan Kelas"
                                @error('kelas') is-invalid @enderror">
                            @error('kelas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

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
                            <input type="file" class="form-control" name="nilaipkl"
                                @error('nilaipkl') is-invalid @enderror">
                            @error('nilaipkl')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" name="status"
                                @error('status') is-invalid @enderror">
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" name="tanggapan"
                                @error('tanggapan') is-invalid @enderror">
                            @error('tanggapan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-3 float-end"><i
                                class="fa fa-save p-1"></i>Save</button>
                        <button type="button" class="btn btn-danger me-3 float-end"
                            data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
