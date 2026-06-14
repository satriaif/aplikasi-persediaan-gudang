@extends('layouts.app')

@section('title', 'Persediaan Barang')

@section('content')

<div class="card hero-dashboard border-0 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h2 class="fw-bold text-white mb-2">
                    Persediaan Material
                </h2>
                <p class="text-white-50 mb-0">
                    Kelola seluruh Persediaan Material
                </p>

            </div>

            <div class="col-md-4 text-end">
                <i class="fas fa-boxes hero-icon"></i>

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4>Persediaan Barang</h4>

        <div>
            @if(auth()->user()->role->nama_role == 'Admin')
            <a href="{{ route('incoming-materials.create') }}" class="btn btn-success">
                <i class="ti ti-plus"></i>
                Barang Masuk
            </a>

            <a href="{{ route('outgoing-materials.create') }}" class="btn btn-danger">
                <i class="ti ti-minus"></i>
                Barang Keluar
            </a>
            @endif
        </div>

    </div>

    <div class="card-body">

        <!-- Search -->

        <form method="GET" class="mb-3">

            <div class="row ">

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari barang..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-auto d-flex align-items-stretch gap-2">

                    <button type="submit" class="btn btn-search">
                        <i class="fas fa-search me-1"></i>
                        Cari
                    </button>

                    <a href="{{ route('persediaan.index') }}" class="btn btn-reset">
                        <i class="fas fa-rotate-right me-1"></i>
                        Reset
                    </a>

                </div>

            </div>

        </form>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif



        <div class="table-responsive">

            <table class="table table-bordered table-striped align-middle">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Stok Saat Ini</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($materials as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $item->updated_at ? $item->updated_at->format('d/m/Y') : '-' }}
                        </td>

                        <td>{{ $item->kode_material }}</td>

                        <td>{{ $item->nama_material }}</td>

                        <td>
                            {{ $item->category->nama_kategori ?? '-' }}
                        </td>

                        <td>
                            <span class="badge bg-success">
                                {{ $item->incomingMaterials->sum('jumlah') }}
                                {{ $item->satuan }}
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-danger">
                                {{ $item->outgoingMaterials->sum('jumlah') }}
                                {{ $item->satuan }}
                            </span>
                        </td>

                        <td>
                            <strong>
                                {{ $item->stok }}
                                {{ $item->satuan }}
                            </strong>
                        </td>

                        <td>

                            @if($item->stok <= 0) <span class="badge bg-dark">
                                Tidak Tersedia
                                </span>

                                @elseif($item->stok <= $item->stok_minimum)

                                    <span class="badge bg-danger">
                                        Warning
                                    </span>

                                    @else

                                    <span class="badge bg-success">
                                        Tersedia
                                    </span>

                                    @endif

                                    <!-- @if($item->stok > 0)

                            <span class="badge bg-success">
                                Tersedia
                            </span>

                            @else

                            <span class="badge bg-danger">
                                Tidak Tersedia
                            </span>

                            @endif -->

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="9" class="text-center">
                            Tidak ada data persediaan
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection