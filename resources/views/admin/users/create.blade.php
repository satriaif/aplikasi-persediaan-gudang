@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">
                    Tambah Pengguna
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('users.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>

                        <select name="role_id" class="form-select" required>

                            <option value="">
                                Pilih Role
                            </option>

                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">
                                {{ $role->nama_role }}
                            </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection