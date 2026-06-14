@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">
                    Edit Pengguna
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>

                        <select name="role_id" class="form-select" required>

                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                {{ $role->nama_role }}
                            </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Password Baru
                        </label>

                        <input type="password" name="password" class="form-control">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengubah password
                        </small>
                    </div>

                    <button class="btn btn-primary">
                        Update
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