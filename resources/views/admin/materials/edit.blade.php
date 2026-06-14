@extends('layouts.app')

@section('title','Edit Material')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Material</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('materials.update',$material->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kategori</label>

                <select name="category_id" class="form-control">

                    @foreach($categories as $category)

                    <option value="{{ $category->id }}" {{ $material->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Kode Material</label>

                <input type="text" name="kode_material" value="{{ $material->kode_material }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama Material</label>

                <input type="text" name="nama_material" value="{{ $material->nama_material }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Satuan</label>

                <input type="text" name="satuan" value="{{ $material->satuan }}" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Stok Minimum</label>
                <input type="number" name="stok_minimum" class="form-control" value="{{ $material->stok_minimum }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="Tersedia" {{ $material->status == 'Tersedia' ? 'selected' : '' }}>
                        Tersedia
                    </option>

                    <option value="Tidak Tersedia" {{ $material->status == 'Tidak Tersedia' ? 'selected' : '' }}>
                        Tidak Tersedia
                    </option>

                </select>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
</div>

@endsection