<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $materials = Material::with('category')
    //     ->latest()
    //     ->get();

    // return view(
    //     'admin.materials.index',
    //     compact('materials')
    // );

     $materials = Material::with('category')

        ->when(request('search'), function ($query) {

            $query->where('nama_material', 'like', '%' . request('search') . '%')
                  ->orWhere('kode_material', 'like', '%' . request('search') . '%');

        })

        ->latest()
        ->get();

    return view(
        'admin.materials.index',
        compact('materials')
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

    return view(
        'admin.materials.create',
        compact('categories')
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'category_id'   => 'required',
        'kode_material' => 'required|unique:materials',
        'nama_material' => 'required',
        'satuan'        => 'required',
    ]);

    Material::create([
        'category_id'   => $request->category_id,
        'kode_material' => $request->kode_material,
        'nama_material' => $request->nama_material,
        'satuan'        => $request->satuan,
        'stok'          => 0,
        'status'        => 'Tersedia',
        'stok_minimum' => $request->stok_minimum,
    ]);

    return redirect()
        ->route('materials.index')
        ->with('success','Material berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
  public function show(Material $material)
{
    $material->load([
        'category',
        'incomingMaterials',
        'outgoingMaterials'
    ]);

    $materials = Material::with([
    'category',
    'incomingMaterials',
    'outgoingMaterials'
])->get();

    $totalMasuk = $material->incomingMaterials->sum('jumlah');

    $totalKeluar = $material->outgoingMaterials->sum('jumlah');

    return view(
        'admin.materials.show',
        compact(
            'material',
            'totalMasuk',
            'totalKeluar'
        )
    );

}

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Material $material)
{
    $categories = Category::all();

    return view(
        'admin.materials.edit',
        compact('material', 'categories')
    );
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Material $material)
{
    $request->validate([
        'category_id' => 'required',
        'kode_material' => 'required|unique:materials,kode_material,' . $material->id,
        'nama_material' => 'required',
        'satuan' => 'required',
        'status' => 'required',
    ]);

    $material->update([
        'category_id' => $request->category_id,
        'kode_material' => $request->kode_material,
        'nama_material' => $request->nama_material,
        'satuan' => $request->satuan,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('materials.index')
        ->with('success', 'Material berhasil diubah');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Material $material)
{
    if (
    $material->incomingMaterials()->exists() ||
    $material->outgoingMaterials()->exists()
) {

    return back()->with(
        'error',
        'Material sudah memiliki transaksi dan tidak dapat dihapus.'
    );
}
    $material->delete();

    return redirect()
        ->route('materials.index')
        ->with('success', 'Material berhasil dihapus');
}

public function persediaan()
{
    $materials = Material::with([
        'category',
        'incomingMaterials',
        'outgoingMaterials'
    ])
    ->when(request('search'), function ($query) {

        $query->where('nama_material', 'like', '%' . request('search') . '%')
              ->orWhere('kode_material', 'like', '%' . request('search') . '%');

    })
    ->get();

    return view(
        'admin.persediaan.index',
        compact('materials')
    );
}
}