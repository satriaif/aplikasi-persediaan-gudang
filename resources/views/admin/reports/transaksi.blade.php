@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')

<div class="card hero-dashboard border-0 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h2 class="fw-bold text-white mb-2">
                    Laporan
                </h2>
                <p class="text-white-50 mb-0">
                    Kelola seluruh laporan transaksi
                </p>


            </div>

            <div class="col-md-4 text-end">

                <i class="fas fa-file-lines hero-icon"></i>

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header">
        <h4>Filter Laporan</h4>
        <small class="text-muted">
            Pilih jenis transaksi dan rentang tanggal untuk menampilkan laporan
        </small>
    </div>

    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-3 mb-3">
                    <label>Jenis Transaksi</label>

                    <select name="jenis" class="form-select">

                        <option value="">
                            Semua Transaksi
                        </option>

                        <option value="masuk" {{ request('jenis') == 'masuk' ? 'selected' : '' }}>
                            Barang Masuk
                        </option>

                        <option value="keluar" {{ request('jenis') == 'keluar' ? 'selected' : '' }}>
                            Barang Keluar
                        </option>

                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Tanggal Awal</label>

                    <input type="date" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
                </div>

                <div class="col-md-3 mb-3">
                    <label>Tanggal Akhir</label>

                    <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
                </div>

                <div class="col-md-3 mb-3 d-flex align-items-end">

                    <button type="submit" class="btn btn-primary me-2">

                        Tampilkan

                    </button>

                    <a href="{{ route('laporan.transaksi') }}" class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </div>

        </form>
        <a href="{{ route('laporan.print', [
    'tanggal_awal' => request('tanggal_awal'),
    'tanggal_akhir' => request('tanggal_akhir'),
    'jenis' => request('jenis')
]) }}" target="_blank" class="btn btn-dark">

            <i class="fas fa-print me-1"></i>
            Cetak

        </a>
        <a href="{{ route('laporan.export.pdf', [
    'tanggal_awal' => request('tanggal_awal'),
    'tanggal_akhir' => request('tanggal_akhir'),
    'jenis' => request('jenis')
]) }}" class="btn btn-danger">

            PDF

        </a>
        <a href="{{ route('laporan.export.csv', request()->query()) }}" class="btn btn-success">
            Export Excel
        </a>
        <!-- <a href="{{ route('laporan.export.excel', [
    'tanggal_awal' => request('tanggal_awal'),
    'tanggal_akhir' => request('tanggal_akhir'),
    'jenis' => request('jenis')
]) }}"
class="btn btn-success">

    Excel

</a> -->
        <!-- <a href="{{ route('laporan.print') }}"
   target="_blank"
   class="btn btn-dark">

    <i class="fas fa-print"></i>
    Cetak
</a>

<a href="{{ route('laporan.export.pdf') }}"
   class="btn btn-danger">

    <i class="fas fa-file-pdf me-1"></i>
    PDF

</a>

<a href="{{ route('laporan.export.excel') }}"
   class="btn btn-success">

    <i class="fas fa-file-excel me-1"></i>
    Excel

</a> -->
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total Transaksi
                </h6>

                <h2>
                    {{ $totalTransaksi }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total Barang Masuk
                </h6>

                <h2 class="text-success">
                    {{ $totalMasuk }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total Barang Keluar
                </h6>

                <h2 class="text-danger">
                    {{ $totalKeluar }}
                </h2>

            </div>

        </div>

    </div>

</div>

<div class="card mt-4">

    <div class="card-header">
        <h4>Data Laporan Transaksi</h4>

        <small class="text-muted">
            Daftar transaksi persediaan sesuai filter yang dipilih
        </small>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Petugas</th>
                        <th>Catatan</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($transaksi as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ date('d-m-Y', strtotime($item['tanggal'])) }}
                        </td>

                        <td>
                            {{ $item['kode'] }}
                        </td>

                        <td>
                            {{ $item['nama_barang'] }}
                        </td>

                        <td>
                            {{ $item['kategori'] }}
                        </td>

                        <td>

                            @if($item['jenis'] == 'Barang Masuk')

                            <span class="badge bg-success">
                                Barang Masuk
                            </span>

                            @else

                            <span class="badge bg-danger">
                                Barang Keluar
                            </span>

                            @endif

                        </td>

                        <td>
                            {{ $item['jumlah'] }}
                            {{ $item['satuan'] }}
                        </td>

                        <td>
                            {{ $item['petugas'] }}
                        </td>

                        <td>
                            {{ $item['catatan'] ?? '-' }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="9" class="text-center text-muted">

                            Tidak ada data laporan

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection