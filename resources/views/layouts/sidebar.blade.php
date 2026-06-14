<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all">

    <div class="sidebar-header d-flex align-items-center">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">

            <i class="fas fa-warehouse text-primary fs-2"></i>

            <div class="ms-2">
                <h5 class="mb-0 fw-bold">
                    Gudang Material
                </h5>

                <small class="text-muted">
                    Inventory System
                </small>
            </div>

        </a>
    </div>

    <div class="sidebar-body pt-0 ">

        <ul class="navbar-nav iq-main-menu" id="sidebar-menu">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home me-2"></i>
                    <span class="item-name">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('persediaan.index') ? 'active' : '' }}"
                    href="{{ route('persediaan.index') }}">
                    <i class="fas fa-boxes me-2"></i>
                    <span class="item-name">Persediaan Material</span>
                </a>
            </li>

            <li class="nav-item static-item mt-3">
                <span class="sidebar-title text-uppercase fw-bold">
                    Master Data
                </span>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('materials.*') ? 'active' : '' }}"
                    href="{{ route('materials.index') }}">
                    <i class="fas fa-box me-2"></i>
                    <span class="item-name">Daftar Material</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                    href="{{ route('categories.index') }}">
                    <i class="fas fa-tags me-2"></i>
                    <span class="item-name">Kategori Material</span>
                </a>
            </li>

            @if(auth()->user()->role->nama_role == 'Admin')

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                    href="{{ route('users.index') }}">
                    <i class="fas fa-users me-2"></i>
                    <span class="item-name">Manajemen Pengguna</span>
                </a>
            </li>

            @endif

            <li class="nav-item static-item mt-3">
                <span class="sidebar-title text-uppercase fw-bold">
                    Transaksi
                </span>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('incoming-materials.*') ? 'active' : '' }}"
                    href="{{ route('incoming-materials.index') }}">
                    <i class="fas fa-arrow-down me-2 text-success"></i>
                    <span class="item-name">Material Masuk</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('outgoing-materials.*') ? 'active' : '' }}"
                    href="{{ route('outgoing-materials.index') }}">
                    <i class="fas fa-arrow-up me-2 text-danger"></i>
                    <span class="item-name">Material Keluar</span>
                </a>
            </li>

            <li class="nav-item static-item mt-3">
                <span class="sidebar-title text-uppercase fw-bold">
                    Laporan
                </span>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('laporan.transaksi') ? 'active' : '' }}"
                    href="{{ route('laporan.transaksi') }}">
                    <i class="fas fa-chart-bar me-2"></i>
                    <span class="item-name">Laporan Transaksi</span>
                </a>
            </li>

        </ul>

    </div>

</aside>