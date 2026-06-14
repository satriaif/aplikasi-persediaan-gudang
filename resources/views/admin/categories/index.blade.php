@extends('layouts.app')

@section('title','Kategori Material')

@section('content')
<div class="card hero-dashboard border-0 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h2 class="fw-bold text-white mb-2">
                    Kategori Material
                </h2>
                <p class="text-white-50 mb-0">
                    Kelola seluruh Kategori material bangunan
                </p>

            </div>

            <div class="col-md-4 text-end">

                <i class="fas fa-layer-group hero-icon"></i>

            </div>

        </div>

    </div>

</div>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Daftar Kategori Material</h4>
        @if(auth()->user()->role->nama_role == 'Admin')
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            Tambah Kategori Material
        </a>
        @endif
    </div>

    <div class="card-body">

        {{-- PESAN BERHASIL --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="GET" class="mb-3">

            <div class="row">

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari kategori material..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-auto d-flex align-items-stretch gap-2">
                    <button class="btn btn-search">
                        <i class="fas fa-search me-1"></i>
                        Cari
                    </button>

                    <a href="{{ url()->current() }}" class="btn btn-reset">
                        <i class="fas fa-rotate-right me-1"></i>
                        Reset
                    </a>

                </div>

            </div>

        </form>
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categories as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            @if(auth()->user()->role->nama_role == 'Admin')
                            <a href="{{ route('categories.edit',$item->id) }}" class="btn btn-edit btn-sm">
                                <i class="fas fa-pen me-1"></i>
                                Edit
                            </a>

                            <form action="{{ route('categories.destroy',$item->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-delete btn-sm" onclick="return confirm('Hapus data?')">
                                    <i class="fas fa-trash me-1"></i>
                                    Hapus
                                </button>

                            </form>
                            @endif
                        </div>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Data kosong
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection