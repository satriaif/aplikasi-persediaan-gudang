<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //      $categories = Category::latest()->get();

    // return view(
    //     'admin.categories.index',
    //     compact('categories')
    // );
      $categories = Category::when(
        request('search'),
        function ($query) {

            $query->where(
                'nama_kategori',
                'like',
                '%' . request('search') . '%'
            )
            ->orWhere(
                'keterangan',
                'like',
                '%' . request('search') . '%'
            );

        }
    )
    ->latest()
    ->get();

    return view(
        'admin.categories.index',
        compact('categories')
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama_kategori' => 'required',
        'keterangan' => 'nullable',
    ]);

    Category::create([
        'nama_kategori' => $request->nama_kategori,
        'keterangan'    => $request->keterangan,
    ]);

    return redirect()
        ->route('categories.index')
        ->with('success', 'Kategori berhasil ditambahkan');
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
   public function edit(Category $category)
{
    return view(
        'admin.categories.edit',
        compact('category')
    );
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Category $category)
{
    $request->validate([
        'nama_kategori' => 'required',
        'keterangan' => 'nullable',
    ]);

    $category->update([
        'nama_kategori' => $request->nama_kategori,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()
        ->route('categories.index')
        ->with('success', 'Kategori berhasil diubah');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    $category->delete();

    return redirect()
        ->route('categories.index')
        ->with('success', 'Kategori berhasil dihapus');
}
}