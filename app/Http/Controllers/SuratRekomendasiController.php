<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratRekomendasiController extends Controller
{
    public function create()
    {
        return view('dashboard.surat_mahasiswa.aktif');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|int|max:7',
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
