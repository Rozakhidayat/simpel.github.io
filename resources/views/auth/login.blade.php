<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">


<link rel="stylesheet" href="{{ asset('css/login.css') }}">



<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg  w-md-75" style="border-radius: 15px; overflow: hidden;">
        <div class="row g-0">
            <!-- Form Login di sebelah kiri -->
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title text-start mt-2">Selamat Datang Di <span>Simpel</span></h4>
                    <p style="padding-left: 30px;">Pantau dan Kelola Semua Informasi PKL dengan Mudah dan Cepat</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="input mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="input-form form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                class="input-form form-control @error('password') is-invalid @enderror" id="password"
                                name="password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check text-end">
                            <a href="">Lupa Password?</a>
                        </div>

                        <!-- Submit Button -->
                        <div class="btn-card d-grid gap-2">
                            <button type="submit" class="btn btn-login">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Gambar di sebelah kanan -->
            <div class="col-6 d-none d-md-block">
                <img src="/img/login.png" alt="Gambar Samping" class="img-fluid img-login ">
            </div>
        </div>

        <script>
            //message with sweetalert
            @if (session('success'))
                Swal.fire({
                    icon: "success",
                    title: "BERHASIL",
                    text: "{{ session('success') }}",
                    showConfirmButton: true,
                    timer: 2000
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: "error",
                    title: "GAGAL!",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        </script>
    </div>
</div>
