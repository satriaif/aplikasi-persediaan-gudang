@extends('layouts.app')

@section('title', 'Material Masuk')

@section('content')
<div class="card hero-dashboard border-0 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h2 class="fw-bold text-white mb-2">
                    Material Masuk
                </h2>
                <p class="text-white-50 mb-0">
                    Informasi seluruh data barang material masuk
                </p>

            </div>

            <div class="col-md-4 text-end">

                <i class="fas fa-arrow-down hero-icon"></i>

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header d-flex justify-content-between">
        <h4>Data Material Masuk</h4>

        <!-- <a href="{{ route('incoming-materials.create') }}" class="btn btn-primary">
            Tambah
        </a> -->
    </div>

    <div class="card-body">
        <form method="GET" class="mb-3">

            <div class="row">

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama material masuk..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-auto d-flex align-items-stretch gap-2">
                    <button type="submit" class="btn btn-search">
                        <i class="fas fa-search me-1"></i>
                        Cari
                    </button>

                    <a href="{{ route('incoming-materials.index') }}" class="btn btn-reset">
                        <i class="fas fa-rotate-right me-1"></i>
                        Reset
                    </a>
                </div>

            </div>

        </form>


        <table class="table table-bordered table-striped align-middle">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Material</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

            <tbody>

                @foreach($incomingMaterials as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->material->nama_material }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>
@endsection