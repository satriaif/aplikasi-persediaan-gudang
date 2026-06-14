<div class="iq-navbar-header">

    <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">

        <div class="container-fluid navbar-inner">

            {{-- Judul Halaman --}}
            <div>

                <h4 class="mb-0 fw-bold">
                    <i class="fas fa-chart-line text-primary me-2"></i>
                    PT JeWePe Steel
                </h4>

                <small class="text-muted">
                    Sistem Persediaan Material Bangunan
                </small>

            </div>

            {{-- Kanan --}}
            <ul class="navbar-nav ms-auto align-items-center">

                {{-- Tanggal --}}
                <li class="nav-item me-4">

                    <span class="text-muted">

                        {{ now()->translatedFormat('l, d F Y') }}

                    </span>

                </li>

                {{-- User --}}
                <li class="nav-item dropdown">

                    <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">

                        <div
                            class="avatar avatar-50 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">

                            {{ strtoupper(substr(auth()->user()->nama,0,1)) }}

                        </div>

                        <div class="ms-3 text-start">

                            <h6 class="mb-0 fw-bold">
                                {{ auth()->user()->nama }}
                            </h6>

                            <small class="text-muted">

                                @if(auth()->user()->role->nama_role == 'Admin')
                                Administrator
                                @else
                                Pimpinan
                                @endif

                            </small>

                        </div>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                        <li>
                            <h6 class="dropdown-header">
                                {{ auth()->user()->nama }}
                            </h6>
                        </li>

                        <li>
                            <span class="dropdown-item-text text-muted">
                                {{ auth()->user()->role->nama_role }}
                            </span>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button type="submit" class="dropdown-item text-danger">

                                    <i class="fas fa-sign-out-alt me-2"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </nav>

</div>

<!-- <div class="iq-navbar-header">

    <nav class="nav navbar navbar-expand-lg iq-navbar">

        <div class="container-fluid navbar-inner">

            {{-- KIRI --}}
            <div>

                <h4 class="fw-bold mb-1">
                    Dashboard
                </h4>

                <div class="text-muted small">

                    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}

                    •

                    Sistem Persediaan Material Bangunan

                </div>

            </div>

            {{-- KANAN --}}
            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item dropdown">

                    <a class="nav-link p-0"
                        href="#"
                        data-bs-toggle="dropdown">

                        <div class="d-flex align-items-center">

                            <div
                                class="avatar-50 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">

                                {{ strtoupper(substr(auth()->user()->nama,0,1)) }}

                            </div>

                            <div class="ms-3 text-start">

                                <h6 class="mb-0 fw-semibold">
                                    {{ auth()->user()->nama }}
                                </h6>

                                <small class="text-muted">
                                    {{ auth()->user()->role->nama_role }}
                                </small>

                            </div>

                        </div>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button type="submit" class="dropdown-item">

                                    <i class="fas fa-sign-out-alt me-2"></i>

                                    Logout

                                </button>
                            </form>
                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </nav>

</div> -->