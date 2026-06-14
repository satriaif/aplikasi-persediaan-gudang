@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')

<div class="row">
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">
                    Detail Pengguna
                </h4>
            </div>

            <div class="card-body">

                <table class="table">

                    <tr>
                        <th width="35%">Nama</th>
                        <td>{{ $user->nama }}</td>
                    </tr>

                    <tr>
                        <th>Username</th>
                        <td>{{ $user->username }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <th>Role</th>
                        <td>{{ $user->role->nama_role }}</td>
                    </tr>

                </table>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </div>

    </div>
</div>

@endsection