<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $users = User::with('role')->latest()->get();

    return view('admin.users.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $roles = Role::all();

    return view('admin.users.create', compact('roles'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    User::create([
        'role_id' => $request->role_id,
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()
        ->route('users.index')
        ->with('success', 'Pengguna berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
   public function show(User $user)
{
    return view(
        'admin.users.show',
        compact('user')
    );
}

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(User $user)
{
    $roles = Role::all();

    return view(
        'admin.users.edit',
        compact('user', 'roles')
    );
}

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, User $user)
{
    $data = [
        'role_id' => $request->role_id,
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()
        ->route('users.index')
        ->with('success', 'Pengguna berhasil diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
{
    $user->delete();

    return redirect()
        ->route('users.index')
        ->with('success', 'Pengguna berhasil dihapus');
}

    
}