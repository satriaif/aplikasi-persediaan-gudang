@extends('layouts.app')

@section('title','Edit Kategori')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Kategori Material</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('categories.update',$category->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ $category->nama_kategori }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3">{{ $category->keterangan }}</textarea>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection