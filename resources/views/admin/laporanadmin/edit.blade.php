@extends('layouts.master')

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
                        <p class="mb-1"><strong>Nama:</strong> <span class="ms-2">{{ $laporans->nama }}</span></p>
                        <p class="mb-1"><strong>NIM:</strong> <span class="ms-2">{{ $laporans->nim }}</span></p>
                        <p class="mb-1">
                            <strong>Laporan PKL:</strong>
                            <span class="ms-2">
                                <a href="{{ asset('storage/laporan/' . basename($laporans->laporanpkl)) }}"
                                    class="btn btn-link" target="_blank">Lihat file</a>
                            </span>
                        </p>
                        <p class="mb-1">
                            <strong>Sertifikat PKL:</strong>
                            <span class="ms-2">
                                <a href="{{ asset('storage/laporan/' . basename($laporans->sertifikat)) }}"
                                    class="btn btn-link" target="_blank">Lihat file</a>
                            </span>
                        </p>
                        <p class="mb-1">
                            <strong>Nilai PKL:</strong>
                            <span class="ms-2">
                                <a href="{{ asset('storage/laporan/' . basename($laporans->nilaipkl)) }}"
                                    class="btn btn-link" target="_blank">Lihat file</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <form action="{{ route('laporanadmin.update', $laporans->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label"><strong>Status</strong></label>
                        <select name="status" class="form-select">
                            <option value="Menunggu" {{ $laporans->status == 'Menunggu' ? 'selected' : '' }}>Menunggu
                            </option>
                            <option value="Diproses" {{ $laporans->status == 'Diproses' ? 'selected' : '' }}>Diproses
                            </option>
                            <option value="Diterima" {{ $laporans->status == 'Diterima' ? 'selected' : '' }}>Diterima
                            </option>
                            <option value="Revisi" {{ $laporans->status == 'Revisi' ? 'selected' : '' }}>Revisi</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Tanggapan</strong></label>
                    <textarea class="form-control @error('tanggapan') is-invalid @enderror" name="tanggapan"
                        placeholder="Masukan Tanggapan Anda">{{ old('tanggapan', $laporans->tanggapan) }}</textarea>
                    @error('tanggapan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="d-flex justify-content-end">
                    <a href="{{ route('laporanadmin.index') }}" class="btn btn-danger me-3"><i
                            class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </main>
@endsection
