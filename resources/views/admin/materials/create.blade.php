@extends('layouts.app')

@section('title','Tambah Jenis Material')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Tambah Jenis Material</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('materials.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Kategori</label>

                <select name="category_id" class="form-control">

                    <option value="">
                        Pilih Kategori
                    </option>

                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->nama_kategori }}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Kode Material</label>

                <input type="text" name="kode_material" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama Material</label>

                <input type="text" name="nama_material" class="form-control">
            </div>

            <div class="mb-3">
                <label>Satuan</label>

                <input type="text" name="satuan" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Stok Minimum</label>
                <input type="number" name="stok_minimum" class="form-control" required>
            </div>

            <button class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('materials.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection