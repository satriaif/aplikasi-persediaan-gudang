@extends('layouts.app')

@section('content')

<div class="card">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card-header">
        <h4>Tambah Material Masuk</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('incoming-materials.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Material</label>

                <select name="material_id" class="form-control">

                    @foreach($materials as $material)

                    <option value="{{ $material->id }}">
                        {{ $material->nama_material }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal Masuk</label>

                <input type="date" name="tanggal_masuk" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jumlah</label>

                <input type="number" name="jumlah" class="form-control">
            </div>

            <div class="mb-3">
                <label>Keterangan</label>

                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('persediaan.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection