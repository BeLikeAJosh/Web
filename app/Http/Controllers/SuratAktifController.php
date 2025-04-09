<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratAktifController extends Controller
{
    public function create()
    {
        return view('dashboard.surat_mahasiswa.aktif');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'semester' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
        ]);

        // SuratAktif::create([
        //     'user_id' => auth()->id(),
        //     'semester' => $validated['semester'],
        //     'alamat' => $validated['alamat'],
        //     'keperluan' => $validated['keperluan'],
        // ]);

        return redirect()->back()->with('success', 'Pengajuan surat berhasil dikirim.');
    }
}
