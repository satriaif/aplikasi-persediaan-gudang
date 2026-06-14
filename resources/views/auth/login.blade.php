@extends('layouts.guest')

@section('title','Login')

@push('styles')

<style>
body::before {
    content: '';

    width: 500px;
    height: 500px;

    position: absolute;

    background: #5b7cff;

    filter: blur(180px);

    opacity: .2;

    top: -100px;
    left: -100px;
}

.login-wrapper {
    min-height: 100vh;

    background:
        linear-gradient(180deg,
            #f8f9fc,
            #eef2f7);

    padding: 30px;
}

.login-card {
    border: none;

    border-radius: 32px;

    overflow: hidden;

    background: #fff;

    box-shadow:
        0 30px 80px rgba(0, 0, 0, .12);
}

.login-left {
    position: relative;

    padding: 80px 70px;

    background:
        linear-gradient(135deg,
            #3a57e8,
            #5f7cff);

    color: #fff;

    overflow: hidden;
}

.login-left::before {
    content: '';

    position: absolute;

    width: 320px;
    height: 320px;

    border-radius: 50%;

    background: rgba(255, 255, 255, .08);

    top: -120px;
    right: -100px;
}

.login-left::after {
    content: '';

    position: absolute;

    width: 220px;
    height: 220px;

    border-radius: 50%;

    background: rgba(255, 255, 255, .05);

    bottom: -100px;
    left: -80px;
}



.login-right {
    padding: 70px;
}

.login-icon {
    font-size: 90px;
    color: rgba(255, 255, 255, .9);
}

.hero-badge {
    display: inline-block;

    background: rgba(255, 255, 255, .15);

    padding: 8px 16px;

    border-radius: 999px;

    color: #fff;

    font-size: .85rem;
    font-weight: 600;
}

.login-description {
    font-size: 16px;
    color: rgba(255, 255, 255, .85);
    max-width: 400px;
}

.form-control {
    height: 56px;

    border: none;

    border-radius: 16px;

    background: #f6f8fc;

    padding: 0 18px;
}

.form-control:focus {
    background: #fff;

    box-shadow:
        0 0 0 4px rgba(58, 87, 232, .12);
}

.btn-login {
    height: 56px;

    border: none;

    border-radius: 16px;

    font-weight: 700;

    background:
        linear-gradient(135deg,
            #3a57e8,
            #5f7cff);

    box-shadow:
        0 12px 25px rgba(58, 87, 232, .25);
}

.btn-login:hover {
    transform: translateY(-2px);
}
</style>

@endpush

@section('content')

<div class="login-wrapper d-flex align-items-center justify-content-center">

    ```
    <div class="container">

        <div class="card login-card">

            <div class="row g-0">

                <div class="col-lg-6 login-left d-flex flex-column justify-content-center">

                    <div>
                        <div class="hero-logo">
                            <div class="mb-4">
                                <i class="fas fa-warehouse login-icon"></i>
                            </div>
                        </div>

                        <span class="hero-badge">
                            Sistem Gudang
                        </span>

                        <h1 class="fw-bold mt-3 mb-2">
                            Sistem Persediaan
                        </h1>

                        <h3 class="fw-semibold mb-4">
                            Material Bangunan
                        </h3>

                        <p class="login-description">
                            Kelola material masuk dan keluar secara cepat,
                            akurat, dan terintegrasi dalam satu sistem.
                        </p>


                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="login-right">

                        <h3 class="fw-bold mb-4 text-center">
                            Login
                        </h3>

                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>Login Gagal!</strong><br>
                            {{ session('error') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button>
                        </div>
                        @endif

                        <form action="{{ route('login.post') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    Username
                                </label>

                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror">

                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    Password
                                </label>

                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">

                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-login w-100 text-white">

                                Login

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
    ```

</div>

@endsection