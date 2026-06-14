@extends('layouts.app')

@section('title', 'Detail Material')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Detail Material Bangunan</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="30%">Kode Material</th>
                <td>{{ $material->kode_material }}</td>
            </tr>

            <tr>
                <th>Nama Material</th>
                <td>{{ $material->nama_material }}</td>
            </tr>

            <tr>
                <th>Kategori</th>
                <td>{{ $material->category->nama_kategori }}</td>
            </tr>

            <tr>
                <th>Satuan</th>
                <td>{{ $material->satuan }}</td>
            </tr>

            <tr>
                <th>Stok Saat Ini</th>
                <td>{{ $material->stok }}</td>
            </tr>

            <tr>
                <th>Stok Minimum</th>
                <td>{{ $material->stok_minimum }}</td>
            </tr>

            <tr>
                <th>Status Stok</th>
                <td>

                    @if($material->stok <= $material->stok_minimum)

                        <span class="badge bg-danger">
                            Stok Minimum
                        </span>

                        @else

                        <span class="badge bg-success">
                            Aman
                        </span>

                        @endif

                </td>
            </tr>

            <tr>
                <th>Status Barang</th>
                <td>
                    <span class="badge bg-primary">
                        {{ $material->status }}
                    </span>
                </td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>
                    {{ $material->created_at->format('d-m-Y H:i') }}
                </td>
            </tr>
        </table>
        <div class="card mt-4">

            <div class="card-header">
                <h5>Riwayat Barang Masuk</h5>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($material->incomingMaterials as $item)

                        <tr>
                            <td>{{ $item->tanggal_masuk }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="3" class="text-center">
                                Belum ada transaksi masuk
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card mt-4">

            <div class="card-header">
                <h5>Riwayat Barang Keluar</h5>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($material->outgoingMaterials as $item)

                        <tr>
                            <td>{{ $item->tanggal_keluar }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="3" class="text-center">
                                Belum ada transaksi keluar
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <a href="{{ route('materials.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </div>
</div>

@endsection