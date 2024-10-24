@extends('layouts.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Dosen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Data Dosen PA</li>
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
                                            <th>Nip</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosen_pas as $dosen_pa)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $dosen_pa->nama }}</td>
                                                <td class="align-middle">{{ $dosen_pa->nip }}</td>
                                                <td class="align-middle">{{ $dosen_pa->email }}</td>
                                                <td class="align-middle">{{ $dosen_pa->no_hp }}</td>
                                                <td class="align-middle">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-active-light-primary"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Actions
                                                            <span class="svg-icon svg-icon-5 m-0">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        </a>

                                                        <ul class="dropdown-menu">

                                                            <li>
                                                                <form id="delete-form-{{ $dosen_pa->id }}"
                                                                    action="{{ route('dosen_pa.destroy', $dosen_pa->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"class="dropdown-item text-danger"
                                                                        onclick="confirmDelete({{ $dosen_pa->id }})">Delete</button>
                                                                </form>
                                                            </li>



                                                        </ul>
                                                    </div>
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

    <!-- Modal Tambah Data Dosen PA -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Dosen PA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dosen_pa.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label class="font-weight-bold">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                placeholder="Masukan NIP">
                            @error('nip')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                                placeholder="Masukan Email">
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">NO HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror " name="no_hp"
                                placeholder="Masukan No HP">
                            @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-3 float-end"><i
                                class="fa fa-save p-1"></i>Save</button>
                        <button type="button" class="btn btn-danger me-3 float-end" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
