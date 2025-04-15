<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratAktif;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SuratAktifController extends Controller
{
    public function create()
    {
        return view('dashboard.surat_mahasiswa.aktif');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keperluan' => 'required|string|max:255',
        ]);

        SuratAktif::create([
            //'user_id' => Auth::user()->id,
            'keperluan' => $request->keperluan,
            'tanggal' => now()
        ]);

        return redirect()->back()->with('success', 'Pengajuan surat berhasil dikirim.');
    }

    public function index()
    {
        $suratAktif = SuratAktif::with('user.mahasiswa')->latest()->get();
        return view('dashboard.kaprodi.surat_aktif', compact('suratAktif'));
    }
}
