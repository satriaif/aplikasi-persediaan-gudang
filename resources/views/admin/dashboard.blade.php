@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


<div class="card hero-dashboard border-0 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h2 class="fw-bold text-white mb-2">
                    Dashboard Informasi Material
                </h2>

                <p class="text-white-50 mb-0">
                   Lihat berbagai informasi material
                </p>

            </div>

            <div class="col-md-4 text-end">

                <i class="fas fa-warehouse hero-icon"></i>

            </div>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-lg col-md-6 mb-3">
        <div class="card stat-card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Total Jenis Material</small>
                    <h3 class="fw-bold mb-0">{{ $totalMaterial }}</h3>
                </div>
                <div class="stat-icon bg-primary-subtle">
                    <i class="fas fa-box text-primary"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg col-md-6 mb-3">
        <div class="card stat-card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Total Stok</small>
                    <h3 class="fw-bold mb-0">{{ $totalStok }}</h3>
                </div>
                <div class="stat-icon bg-success-subtle">
                    <i class="fas fa-warehouse text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg col-md-6 mb-3">
        <div class="card stat-card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Material Stok Minimum</small>
                    <h3 class="fw-bold mb-0">{{ $stokMinimum }}</h3>
                </div>
                <div class="stat-icon bg-warning-subtle">
                    <i class="fas fa-exclamation-triangle text-warning"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg col-md-6 mb-3">
        <div class="card stat-card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Material Masuk</small>
                    <h3 class="fw-bold mb-0">{{ $materialMasuk }}</h3>
                </div>
                <div class="stat-icon bg-success-subtle">
                    <i class="fas fa-arrow-down text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg col-md-6 mb-3">
        <div class="card stat-card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Material Keluar</small>
                    <h3 class="fw-bold mb-0">{{ $totalKeluar }}</h3>
                </div>
                <div class="stat-icon bg-danger-subtle">
                    <i class="fas fa-arrow-up text-danger"></i>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row mt-4">

    <!-- Grafik -->
    <div class="col-md-8">

        <div class="card chart-card h-100">

            <div class="card-header bg-transparent border-0 pt-4">
                <h5 class="fw-bold mb-1">
                    Grafik Transaksi Barang Masuk & Keluar
                </h5>
                <small class="text-muted">
                    Pergerakan material masuk dan keluar
                </small>
            </div>

            <div class="card-body" style="height:400px;">
                <canvas id="grafikTransaksi"></canvas>
            </div>

        </div>

    </div>

    <!-- Transaksi Terbaru -->
    <div class="col-md-4">

        <div class="card h-100">

            <div class="card-header border-0 pb-0">

                <h5 class="fw-bold mb-1">
                    Transaksi Terbaru
                </h5>

                <small class="text-muted">
                    Aktivitas material terbaru
                </small>

            </div>

            <div class="card-body">

                @forelse($transaksiTerbaru as $trx)

                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">


                    <div class="me-3">

                        @if($trx['jenis'] == 'Masuk')

                        <div class="trx-icon bg-success-subtle">
                            <i class="fas fa-arrow-down text-success"></i>
                        </div>

                        @else

                        <div class="trx-icon bg-danger-subtle">
                            <i class="fas fa-arrow-up text-danger"></i>
                        </div>

                        @endif

                    </div>

                    <div class="flex-grow-1">

                        <h6 class="mb-1 fw-semibold">
                            {{ $trx['material'] }}
                        </h6>

                        <small class="text-muted">
                            {{ date('d-m-Y', strtotime($trx['tanggal'])) }}
                            •
                            {{ $trx['user'] }}
                        </small>

                    </div>

                    <div class="text-end">

                        @if($trx['jenis'] == 'Masuk')

                        <span class="badge bg-success">
                            Masuk
                        </span>

                        @else

                        <span class="badge bg-danger">
                            Keluar
                        </span>

                        @endif

                        <div class="fw-semibold mt-1">
                            {{ $trx['jumlah'] }}
                            {{ $trx['satuan'] }}
                        </div>

                    </div>

                </div>

                @empty

                <div class="text-center text-muted">
                    Belum ada transaksi
                </div>

                @endforelse

                <div class="text-center mt-3">

                    <a href="{{ route('laporan.transaksi') }}" class="btn btn-outline-primary">

                        Lihat Laporan

                    </a>

                </div>

            </div>

        </div>

    </div>


</div>

<div class="row mt-4">

    <div class="col-md-6">

        <div class="card stock-card">

            <div class="card-header border-0 pb-0">
                <h5 class="fw-bold mb-1">
                    5 Stok Terendah
                </h5>
                <small class="text-muted">
                    Material dengan stok di bawah 10
                </small>
            </div>

            <div class="card-body">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Material</th>
                            <th> Stok</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($stokTerendah as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <div class="fw-semibold">
                                    {{ $item->nama_material }}
                                </div>
                            </td>

                            <td>
                                <span class="badge rounded-pill bg-danger">
                                    {{ $item->stok }}
                                </span>
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="3" class="text-center">
                                Tidak ada data
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card stock-card">

            <div class="card-header border-0 pb-0">

                <h5 class="fw-bold mb-1">
                    5 Stok Tertinggi
                </h5>

                <small class="text-muted">
                    Material dengan stok terbanyak
                </small>

            </div>

            <div class="card-body">

                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Material</th>
                            <th>Stok</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($stokTertinggi as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->nama_material }}</td>

                            <td>
                                <span class="badge rounded-pill bg-success">
                                    {{ $item->stok }}
                                </span>
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="3" class="text-center">
                                Tidak ada data
                            </td>
                        </tr>

                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const labels = @json($grafikMasuk -> pluck('tanggal'));
const dataMasuk = @json($grafikMasuk -> pluck('total'));
const dataKeluar = @json($grafikKeluar -> pluck('total'));

const ctx = document.getElementById('grafikTransaksi');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
                label: 'Barang Masuk',
                data: dataMasuk,

                borderRadius: 10,
                borderSkipped: false,
                backgroundColor: '#3a57e8'
            },
            {
                label: 'Barang Keluar',
                data: dataKeluar,

                borderRadius: 10,
                borderSkipped: false,

                backgroundColor: '#08B1BA'
            }
        ]
    },
    options: {

        responsive: true,
        maintainAspectRatio: false,

        plugins: {

            legend: {
                position: 'top',

                labels: {
                    usePointStyle: true,
                    pointStyle: 'circle',
                    padding: 20
                }
            }

        },

        scales: {

            x: {

                grid: {
                    display: false
                }

            },

            y: {

                beginAtZero: true,

                grid: {
                    color: '#f1f3f5'
                }

            }

        }

    }
});
</script>

@endpush