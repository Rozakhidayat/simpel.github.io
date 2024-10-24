@extends('layouts.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Mahasiswa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"> Data Mahasiswa</li>
                 
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
                                <table class="table datatable">
                                    <thead>

                                        <tr>
                                            <th>No</th>
                                            <th>

                                                <b>N</b>ama
                                            </th>
                                            <th>Nim</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($mahasiswas as $mahasiswa)
                                            <tr>
                                                <td class="align-middle" style="padding-left: 15px;">{{ $loop->iteration }}
                                                </td>
                                                <td class="align-middle">{{ $mahasiswa->nama }}</td>
                                                <td class="align-middle">{{ $mahasiswa->nim }}</td>
                                                <td class="align-middle">{{ $mahasiswa->kelas }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('data_mahasiswa.show', $mahasiswa->id) }}"
                                                        class="btn btn-sm btn-outline-primary"><i
                                                            class="bi bi-search p-1"></i>Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('data_mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Daftar Mahasiswa</label>
                            <select class="form-select" id="mahasiswa" name="id">

                                @foreach ($users as $user)
                                    @if ($user->role !== 'Admin')
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nim</label>
                            <input type="text" class="form-control" name="nim" placeholder="Masukan Nim"
                                @error('nim') is-invalid @enderror">
                            @error('nim')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Kelas</label>
                            <input type="text" class="form-control" name="kelas" placeholder="Masukan kelas"
                                @error('kelas') is-invalid @enderror">
                            @error('kelas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Semester</label>
                            <input type="number" class="form-control" name="semester" placeholder="Masukan Semester"
                                @error('semester') is-invalid @enderror">
                            @error('semester')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" placeholder="Masukan jurusan"
                                @error('jurusan') is-invalid @enderror">
                            @error('jurusan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Dosen PA</label>
                            <select class="form-select" id="mahasiswa" name="id_dosen">

                                @foreach ($dosen_pas as $dosen_pa)
                                    <option value="{{ $dosen_pa->id }}">
                                        {{ $dosen_pa->nama }}</option>
                                @endforeach
                            </select>
                            @error('id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary me-3 float-end"><i
                                class="fa fa-save p-1"></i>Save</button>
                        <button type="button" class="btn btn-danger me-3 float-end" data-bs-dismiss="modal">Cancel</button>








                        </body>
                    </form>
                @endsection
