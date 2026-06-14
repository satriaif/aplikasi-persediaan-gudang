<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IncomingMaterial;
use App\Models\OutgoingMaterial;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanTransaksiExport;
class ReportController extends Controller
{
    public function exportCsv(Request $request)
{
    $transaksi = $this->getLaporan($request);

    $filename = 'laporan-transaksi.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=$filename",
    ];

    $callback = function () use ($transaksi) {

        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'Tanggal',
            'Kode',
            'Nama Material',
            'Kategori',
            'Jenis',
            'Jumlah',
            'Satuan',
            'Petugas',
            'Catatan'
        ]);

        foreach ($transaksi as $item) {

            fputcsv($file, [
                $item['tanggal'],
                $item['kode'],
                $item['nama_barang'],
                $item['kategori'],
                $item['jenis'],
                $item['jumlah'],
                $item['satuan'],
                $item['petugas'],
                $item['catatan']
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}

    public function exportPdf(Request $request)
{
    $transaksi = $this->getLaporan($request);

    $pdf = Pdf::loadView(
        'admin.reports.pdf',
        compact('transaksi')
    );

    return $pdf->download(
        'laporan-transaksi.pdf'
    );
}

public function exportExcel(Request $request)
{
    $transaksi = $this->getLaporan($request);

    return Excel::download(
        new LaporanTransaksiExport($transaksi),
        'laporan-transaksi.xlsx'
    );
}
    public function print(Request $request)
{
    $transaksi = $this->getLaporan($request);

    return view(
        'admin.reports.print',
        compact('transaksi')
    );
}
    public function transaksi(Request $request)
    {
        $transaksi = collect();

        if (
            $request->filled('tanggal_awal') &&
            $request->filled('tanggal_akhir')
        ) {

            $masuk = IncomingMaterial::with([
                'material.category',
                'user'
            ])
            ->whereBetween(
                'tanggal_masuk',
                [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]
            )
            ->get()
            ->map(function ($item) {

                return [
                    'tanggal' => $item->tanggal_masuk,
                    'kode' => $item->material->kode_material,
                    'nama_barang' => $item->material->nama_material,
                    'kategori' => $item->material->category->nama_kategori,
                    'jenis' => 'Barang Masuk',
                    'jumlah' => $item->jumlah,
                    'satuan' => $item->material->satuan,
                    'petugas' => $item->user->nama ?? '-',
                    'catatan' => $item->keterangan,
                ];
            });

            $keluar = OutgoingMaterial::with([
                'material.category',
                'user'
            ])
            ->whereBetween(
                'tanggal_keluar',
                [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]
            )
            ->get()
            ->map(function ($item) {

                return [
                    'tanggal' => $item->tanggal_keluar,
                    'kode' => $item->material->kode_material,
                    'nama_barang' => $item->material->nama_material,
                    'kategori' => $item->material->category->nama_kategori,
                    'jenis' => 'Barang Keluar',
                    'jumlah' => $item->jumlah,
                    'satuan' => $item->material->satuan,
                    'petugas' => $item->user->nama ?? '-',
                    'catatan' => $item->keterangan,
                ];
            });

            if ($request->jenis == 'masuk') {

                $transaksi = $masuk;

            } elseif ($request->jenis == 'keluar') {

                $transaksi = $keluar;

            } else {

                $transaksi = $masuk
                    ->merge($keluar)
                    ->sortByDesc('tanggal');
            }
        }

        $totalTransaksi = $transaksi->count();

        $totalMasuk = $transaksi
            ->where('jenis', 'Barang Masuk')
            ->sum('jumlah');

        $totalKeluar = $transaksi
            ->where('jenis', 'Barang Keluar')
            ->sum('jumlah');

        return view(
            'admin.reports.transaksi',
            compact(
                'transaksi',
                'totalTransaksi',
                'totalMasuk',
                'totalKeluar'
            )
        );
    }

    private function getLaporan(Request $request = null)
{
    $masuk = IncomingMaterial::with([
        'material.category',
        'user'
    ])
    ->when(
        $request &&
        $request->filled('tanggal_awal') &&
        $request->filled('tanggal_akhir'),
        function ($query) use ($request) {
            $query->whereBetween(
                'tanggal_masuk',
                [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]
            );
        }
    )
    ->get()
    ->map(function ($item) {

        return [
            'tanggal' => $item->tanggal_masuk,
            'kode' => $item->material->kode_material,
            'nama_barang' => $item->material->nama_material,
            'kategori' => $item->material->category->nama_kategori,
            'jenis' => 'Barang Masuk',
            'jumlah' => $item->jumlah,
            'satuan' => $item->material->satuan,
            'petugas' => $item->user->nama ?? '-',
            'catatan' => $item->keterangan,
        ];
    });

    $keluar = OutgoingMaterial::with([
        'material.category',
        'user'
    ])
    ->when(
        $request &&
        $request->filled('tanggal_awal') &&
        $request->filled('tanggal_akhir'),
        function ($query) use ($request) {
            $query->whereBetween(
                'tanggal_keluar',
                [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]
            );
        }
    )
    ->get()
    ->map(function ($item) {

        return [
            'tanggal' => $item->tanggal_keluar,
            'kode' => $item->material->kode_material,
            'nama_barang' => $item->material->nama_material,
            'kategori' => $item->material->category->nama_kategori,
            'jenis' => 'Barang Keluar',
            'jumlah' => $item->jumlah,
            'satuan' => $item->material->satuan,
            'petugas' => $item->user->nama ?? '-',
            'catatan' => $item->keterangan,
        ];
    });

    $transaksi = $masuk
        ->merge($keluar)
        ->sortByDesc('tanggal');

    if ($request && $request->filled('jenis')) {

        if ($request->jenis == 'masuk') {
            $transaksi = $transaksi->where('jenis', 'Barang Masuk');
        }

        if ($request->jenis == 'keluar') {
            $transaksi = $transaksi->where('jenis', 'Barang Keluar');
        }
    }

    return $transaksi;
}
}