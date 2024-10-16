<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg w-75" style="border-radius: 15px; overflow: hidden;">
        <div class="row g-0">
            <!-- Form Login di sebelah kiri -->
            <div class="col-md-6">
                <div class="card-body">
                    <h3 class="card-title text-start m-3">Buat Akun
                        <span>Literia</span>
                    </h3>
                    <p style="padding-left: 30px;">Temukan, Beli, dan Baca Buku Favorit Anda Kapan Saja, Di Mana Saja
                    </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-2 input-card">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control input-form @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 input-card">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control input-form @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-2 input-card">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="email"
                                class="form-control input-form @error('password') is-invalid @enderror" id="password"
                                name="password" value="{{ old('password') }}" required autofocus>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-2 input-card">
                            <label for="password_confirmation" class="form-label">Ulangi Password</label>
                            <input type="password"
                                class="form-control input-form @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" required autofocus>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4 link">
                            <a href="{{ route('login') }}" class="ms-3">Sudah Punya Akun?</a>
                            <button type="submit" class="btn btn-sm rounded btn-daftar">
                                Daftar
                            </button>
                        </div>


                    </form>
                </div>
            </div>

            <!-- Gambar di sebelah kanan -->
            <div class="col-md-6 d-none d-md-block mt-5">
                <img src="/img/login.png" alt="Gambar Samping" class="img-fluid w-110 h-110" style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>
