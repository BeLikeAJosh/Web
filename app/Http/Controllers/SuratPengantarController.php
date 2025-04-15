<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratPengantarController extends Controller
{
    public function create()
    {
        return view('dashboard.surat_mahasiswa.aktif');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tujukan' => 'required|string|max:255',
            'matkul' => 'required|max:100',
            'data' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'topik' => 'required|string|max:255',
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
