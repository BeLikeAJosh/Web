<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeteranganController extends Controller
{
    public function create()
    {
        return view('dashboard.surat_mahasiswa.aktif');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nama' => 'required|string|max:255',
            'NRP' => 'required|int|max:7',
            'tanggal' => 'required|numeric',
        ]);

        return redirect()->back()->with('success', 'Pengajuan surat berhasil dikirim.');
    }
}
