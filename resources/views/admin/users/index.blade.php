@extends('layouts.app')

@section('title', 'Data Pengguna')

@section('content')

<div class="card hero-dashboard border-0 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                 <h2 class="fw-bold text-white mb-2">
                     Manajemen Pengguna
                </h2>
                <p class="text-white-50 mb-0">
                     Kelola seluruh akun pengguna
                </p>
                

            </div>

            <div class="col-md-4 text-end">

           <i class="fas fa-users-cog  hero-icon"></i>

            </div>

        </div>

    </div>

</div>

               
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">

                <h4 class="card-title mb-0">
                    Data Pengguna
                </h4>

                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    Tambah Pengguna
                </a>

            </div>

            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($users as $user)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $user->role->nama_role }}
                                    </span>
                                </td>

                                <td>

                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-detail btn-sm">
                                        <i class="fas fa-eye me-1"></i>
                                        Detail
                                    </a>

                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit btn-sm">
                                        <i class="fas fa-pen me-1"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete btn-sm"
                                            onclick="return confirm('Yakin hapus pengguna?')">
                                             <i class="fas fa-trash me-1"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </td>
                            </tr>

                            @empty

                            <tr>
                                <td colspan="6" class="text-center">
                                    Data pengguna belum tersedia
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection