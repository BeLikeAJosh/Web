<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class MahasiswaController extends Controller
{
    // Insert Section
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('dashboard.admin.mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('dashboard.admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|unique:mahasiswa,nrp',
            'alamat' => 'required|string',
            'semester' => 'required|integer',
            'fakultas' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'fakultas' => $request->fakultas,
        ]);
        return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $mahasiswa = Mahasiswa::findOrFail($request->id);
        return view('dashboard.admin.mahasiswa.edit', compact('mahasiswa'));
    }

    // Update section
    public function update(Request $request)
    {
        $mahasiswa = Mahasiswa::findOrFail($request->id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|unique:mahasiswas,nrp,' . $mahasiswa->id,
            'alamat' => 'required|string',
            'semester' => 'required|integer',
            'fakultas' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $mahasiswa->user_id,
            'password' => 'nullable|string|min:6',
        ]);

        // Update data mahasiswa
        $mahasiswa->update([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'fakultas' => $request->fakultas,
        ]);

        $user = $mahasiswa->user;
        $user->name = $request->nama;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }
}
