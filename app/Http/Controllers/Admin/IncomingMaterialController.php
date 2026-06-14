<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IncomingMaterial;
use App\Models\Material;

class IncomingMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    // $incomingMaterials = IncomingMaterial::with('material')
    //     ->latest()
    //     ->get();

    // return view(
    //     'admin.incoming_materials.index',
    //     compact('incomingMaterials')
    // );
   
    
      $incomingMaterials = IncomingMaterial::with('material')
    ->when(request('search'), function ($query) {

        $query->whereHas('material', function ($q) {

            $q->where(
                'nama_material',
                'like',
                '%' . request('search') . '%'
            );

        });

    })
    ->latest()
    ->get();

return view(
    'admin.incoming_materials.index',
    compact('incomingMaterials')
);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $materials = Material::all();

    return view(
        'admin.incoming_materials.create',
        compact('materials')
    );
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'material_id' => 'required',
        'tanggal_masuk' => 'required',
        'jumlah' => 'required|numeric|min:1',
        'keterangan' => 'nullable',
    ]);

    IncomingMaterial::create([
        'material_id' => $request->material_id,
        'user_id' => auth()->id(),
        'tanggal_masuk' => $request->tanggal_masuk,
        'jumlah' => $request->jumlah,
        'keterangan' => $request->keterangan,
    ]);

    $material = Material::findOrFail(
        $request->material_id
    );

    $material->stok += $request->jumlah;

    $material->status = 'Tersedia';

    $material->save();

    return redirect()
        ->route('incoming-materials.index')
        ->with(
            'success',
            'Material masuk berhasil disimpan'
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