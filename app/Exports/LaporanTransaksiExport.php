<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanTransaksiExport implements FromCollection, WithHeadings
{
    protected $transaksi;

    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function collection()
    {
        return collect($this->transaksi)->map(function ($item) {

            return [
                $item['tanggal'],
                $item['kode'],
                $item['nama_barang'],
                $item['kategori'],
                $item['jenis'],
                $item['jumlah'],
                $item['satuan'],
                $item['petugas'],
                $item['catatan']
            ];

        });
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Kode Material',
            'Nama Material',
            'Kategori',
            'Jenis',
            'Jumlah',
            'Satuan',
            'Petugas',
            'Catatan'
        ];
    }
}