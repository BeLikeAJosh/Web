<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratLaporanController extends Controller
{
    public function create()
    {
        return view('dashboard.surat_mahasiswa.aktif');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
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
