<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Material;
use App\Models\IncomingMaterial;
use App\Models\OutgoingMaterial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
     public function admin()
    {
        $totalStok = Material::sum('stok');
        $materialMasuk = IncomingMaterial::sum('jumlah');
        $materialKeluar = OutgoingMaterial::sum('jumlah');
        $stokTerendah = Material::where('stok', '<', 10)
      ->orderBy('stok', 'asc')
    ->take(5)
    ->get();
        
        $stokTertinggi = Material::where('stok', '>=', 10)
    ->orderBy('stok', 'desc')
    ->take(5)
    ->get();
        
        $totalMaterial = Material::count();


        $totalKeluar = OutgoingMaterial::sum('jumlah');

        $stokMinimum = Material::where('stok', '>', 0)
                        ->whereColumn('stok', '<=', 'stok_minimum')
                        ->count();

        $stokAman = Material::whereColumn(
            'stok',
            '>',
            'stok_minimum'
        )->count();

        $grafikMasuk = IncomingMaterial::select(
        DB::raw('DATE(tanggal_masuk) as tanggal'),
        DB::raw('SUM(jumlah) as total')
    )
    ->groupBy('tanggal')
    ->orderBy('tanggal')
    ->get();
    
$transaksiMasuk = IncomingMaterial::with('material')
    ->latest()
    ->take(5)
    ->get()
    ->map(function ($item) {
        return [
            'tanggal' => $item->tanggal_masuk,
            'material' => $item->material->nama_material,
            'jumlah' => $item->jumlah,
            'jenis' => 'Masuk',
            'user' => $item->user->nama,
            'satuan' => $item->material->satuan,
        ];
    });

$transaksiKeluar = OutgoingMaterial::with('material')
    ->latest()
    ->take(5)
    ->get()
    ->map(function ($item) {
        return [
            'tanggal' => $item->tanggal_keluar,
            'material' => $item->material->nama_material,
            'jumlah' => $item->jumlah,
            'jenis' => 'Keluar',
            'user' => $item->user->nama,
            'satuan' => $item->material->satuan,
        ];
    });

$transaksiTerbaru = $transaksiMasuk
    ->merge($transaksiKeluar)
    ->sortByDesc('tanggal')
    ->take(5);

$grafikKeluar = OutgoingMaterial::select(
        DB::raw('DATE(tanggal_keluar) as tanggal'),
        DB::raw('SUM(jumlah) as total')
    )
    ->groupBy('tanggal')
    ->orderBy('tanggal')
    ->get();

        return view(
    'admin.dashboard',
    compact(
        'totalMaterial',
        'totalStok',
        'materialMasuk',
        'materialKeluar',
        'totalKeluar',
        'stokMinimum',
        'stokAman',
        'stokTerendah',
        'stokTertinggi',
        'grafikMasuk',
        'grafikKeluar',
        'transaksiTerbaru'
    )
);
    }
}