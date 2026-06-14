@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Tambah Material Keluar</h4>
    </div>

    <div class="card-body">

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('outgoing-materials.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Material</label>

                <select name="material_id" class="form-control">

                    @foreach($materials as $material)

                    <option value="{{ $material->id }}">
                        {{ $material->nama_material }}
                        (Stok: {{ $material->stok }})
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal Keluar</label>

                <input type="date" name="tanggal_keluar" class="form-control" value="{{ old('tanggal_masuk') }}">
            </div>

            <div class="mb-3">
                <label>Jumlah</label>

                <input type="number" name="jumlah" class="form-control">
            </div>

            <div class="mb-3">
                <label>Keterangan</label>

                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button class="btn btn-danger">
                Simpan
            </button>

            <a href="{{ route('persediaan.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection