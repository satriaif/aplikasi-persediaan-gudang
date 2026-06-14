<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OutgoingMaterial;
use App\Models\Material;
class OutgoingMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    // $outgoingMaterials = OutgoingMaterial::with('material')
    //     ->latest()
    //     ->get();

    // return view(
    //     'admin.outgoing_materials.index',
    //     compact('outgoingMaterials')
    // );
    

    $outgoingMaterials = OutgoingMaterial::with('material')

        ->when(
            request('search'),
            function ($query) {

                $query->whereHas(
                    'material',
                    function ($q) {

                        $q->where(
                            'nama_material',
                            'like',
                            '%' . request('search') . '%'
                        );

                    }
                );

            }
        )

        ->latest()
        ->get();

    return view(
        'admin.outgoing_materials.index',
        compact('outgoingMaterials')
    );

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $materials = Material::where('stok', '>', 0)
        ->get();

    return view(
        'admin.outgoing_materials.create',
        compact('materials')
    );
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
   $request->validate([
    'material_id'     => 'required',
    'tanggal_keluar'  => 'required',
    'jumlah'          => 'required|numeric|min:1',
    'keterangan'      => 'nullable',
]);

    $material = Material::findOrFail(
        $request->material_id
    );

    if ($request->jumlah > $material->stok) {

        return back()
            ->with('error',
                'Stok tidak mencukupi'
            );
    }

    OutgoingMaterial::create([
    'material_id'     => $request->material_id,
    'user_id'         => auth()->id(),
    'tanggal_keluar'  => $request->tanggal_keluar,
    'jumlah'          => $request->jumlah,
    'keterangan'      => $request->keterangan,
]);

    $material->stok -= $request->jumlah;

    if ($material->stok <= 0) {

        $material->status =
            'Tidak Tersedia';
    }

    $material->save();

    return redirect()
        ->route('outgoing-materials.index')
        ->with(
            'success',
            'Material keluar berhasil disimpan'
        );
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}