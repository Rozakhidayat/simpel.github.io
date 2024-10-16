@extends('layouts.master')

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
                                                    <a href="{{ route('laporanadmin.edit', $laporan->id) }}"
                                                        class="btn btn-sm btn-outline-primary"><i
                                                            class="bi bi-eye p-1"></i>View</a>
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
@endsection
