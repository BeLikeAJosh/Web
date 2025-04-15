<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen;

class KaprodiController extends Controller
{
    public function update(Request $request)
    {
        $kaprodi = Dosen::findOrFail($request->id);

        $request->validate([
            'Nama' => 'required',
            'nik' => 'required',
            'Jabatan' => 'required',
            'nomor_hp' => 'required',
            'Email' => 'required|email',
            'email_login' => 'required|email',
        ]);

        $kaprodi->update([
            'Nama' => $request->Nama,
            'nik' => $request->nik,
            'Jabatan' => $request->Jabatan,
            'nomor_hp' => $request->nomor_hp,
            'Email' => $request->Email,
        ]);

        if ($kaprodi->user) {
            $kaprodi->user->update([
                'email' => $request->email_login,
                'password' => $request->filled('password')
                    ? Hash::make($request->password)
                    : $kaprodi->user->password,
            ]);
        }

        return redirect()->route('kaprodi.index')->with('success', 'Data kaprodi berhasil diperbarui.');
    }


    public function index()
    {
        $kaprodi = Dosen::with('user')->first();
        return view('dashboard.admin.kaprodi.index', compact('kaprodi'));
    }

    public function edit(Request $request)
    {
        $kaprodi = Dosen::with('user')->findOrFail($request->id);
        return view('dashboard.admin.kaprodi.edit', compact('kaprodi'));
    }
}
