@extends('layouts.app')

@section('title','Material Bangunan')

@section('content')
<div class="card hero-dashboard border-0 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-8">
                 <h2 class="fw-bold text-white mb-2">
                     Daftar Material
                </h2>
                <p class="text-white-50 mb-0">
                   Kelola seluruh data material bangunan
                </p>

            </div>

            <div class="col-md-4 text-end">

                <i class="fas fa-cubes hero-icon"></i>

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header d-flex justify-content-between">
        <h4>Data Material</h4>
        @if(auth()->user()->role->nama_role == 'Admin') 
        <a href="{{ route('materials.create') }}" class="btn btn-primary">
            Tambah Jenis Material
        </a>
        @endif
    </div>

    <div class="card-body">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="GET" class="mb-3">

            <div class="row">

                 <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari kode atau nama material..."
                        value="{{ request('search') }}">
                </div>

                 <div class="col-md-auto d-flex align-items-stretch gap-2">
                    <button type="submit" class="btn btn-search"> 
                        <i class="fas fa-search me-1"></i>
                        Cari
                    </button>

                    <a href="{{ route('materials.index') }}" class="btn btn-reset"> 
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
                    <th>Kode</th>
                    <th>Nama Material</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Status Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($materials as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_material }}</td>
                    <td>{{ $item->nama_material }}</td>
                    <td>{{ $item->category->nama_kategori }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>{{ $item->stok }}</td>

                  <td>

                        @if($item->stok <= 0)

                            <span class="badge bg-dark">
                                Stok Tidak Ada
                            </span>

                        @elseif($item->stok <= $item->stok_minimum)

                            <span class="badge bg-danger">
                                Stok Minimum
                            </span>

                        @else

                            <span class="badge bg-success">
                                Aman
                            </span>

                        @endif

                    </td>

                    <td>
                        <span class="badge bg-primary">
                            {{ $item->status }}
                        </span>
                    </td>



                    <td>
                        <a href="{{ route('materials.show', $item->id) }}"class="btn btn-detail btn-sm">
    <i class="fas fa-eye me-1"></i>
                            Detail
                        </a>

                        @if(auth()->user()->role->nama_role == 'Admin')
                        <a href="{{ route('materials.edit',$item->id) }}" class="btn btn-edit btn-sm">
                            <i class="fas fa-pen me-1"></i>
                            Edit
                        </a>

                        <form action="{{ route('materials.destroy',$item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-delete btn-sm" onclick="return confirm('Hapus material ini?')">
                            <i class="fas fa-trash me-1"></i>    
                            Hapus
                            </button>
                        </form>

                          @endif
                    </td>
                 

                </tr>

    </div>

</div>

</div>

@endforeach


</div>

@endsection