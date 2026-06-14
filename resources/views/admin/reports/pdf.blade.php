<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi Material</title>


    <style>
    body {
        font-family: Arial, sans-serif;
        color: #212529;
        margin: 30px;
    }

    .header {
        text-align: center;
        margin-bottom: 25px;
    }

    .header h2 {
        margin: 0;
    }

    .header p {
        margin-top: 5px;
        color: #6c757d;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #dee2e6;
        padding: 8px;
        font-size: 13px;
    }

    table th {
        background: #f8f9fa;
        text-align: center;
    }

    .text-center {
        text-align: center;
    }

    .badge-masuk {
        color: #198754;
        font-weight: bold;
    }

    .badge-keluar {
        color: #dc3545;
        font-weight: bold;
    }

    .footer {
        margin-top: 40px;
        text-align: right;
    }
    </style>


</head>

<body>


    <div class="header">
        <h2>LAPORAN TRANSAKSI MATERIAL</h2>
        <p>Sistem Persediaan Material Bangunan</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Material</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Petugas</th>
                <th>Catatan</th>
            </tr>
        </thead>

        <tbody>

            @forelse($transaksi as $item)

            <tr>
                <td class="text-center">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($item['tanggal'])->format('d-m-Y') }}
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

                <td class="text-center">

                    @if($item['jenis'] == 'Barang Masuk')

                    <span class="badge-masuk">
                        Masuk
                    </span>

                    @else

                    <span class="badge-keluar">
                        Keluar
                    </span>

                    @endif

                </td>

                <td class="text-center">
                    {{ $item['jumlah'] }}
                </td>

                <td class="text-center">
                    {{ $item['satuan'] }}
                </td>

                <td>
                    {{ $item['petugas'] }}
                </td>

                <td>
                    {{ $item['catatan'] }}
                </td>
            </tr>

            @empty

            <tr>
                <td colspan="10" class="text-center">
                    Tidak ada data laporan
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>

    <div class="footer">
        <p>
            Dicetak pada :
            {{ now()->format('d-m-Y H:i') }}
        </p>
    </div>


</body>

</html>