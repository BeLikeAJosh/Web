<?php

namespace App\Http\Controllers;

use App\Models\SuratAktif;
use App\Models\SuratKeterangan;
use App\Models\SuratLaporan;
use App\Models\SuratPengantar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $suratAktif = SuratAktif::with('mahasiswa')->get()->map(function ($item) {
            return [
                'nama_mahasiswa' => $item->mahasiswa->nama ?? '-',
                'jenis_surat' => 'Surat Aktif',
                'status' => $item->status,
                'tanggal' => $item->created_at,
            ];
        });

        $suratKeterangan = SuratKeterangan::with('mahasiswa')->get()->map(function ($item) {
            return [
                'nama_mahasiswa' => $item->mahasiswa->nama ?? '-',
                'jenis_surat' => 'Surat Keterangan',
                'status' => $item->status,
                'tanggal' => $item->created_at,
            ];
        });

        $suratLaporan = SuratLaporan::with('mahasiswa')->get()->map(function ($item) {
            return [
                'nama_mahasiswa' => $item->mahasiswa->nama ?? '-',
                'jenis_surat' => 'Surat Laporan',
                'status' => $item->status,
                'tanggal' => $item->created_at,
            ];
        });

        $suratPengantar = SuratPengantar::with('mahasiswa')->get()->map(function ($item) {
            return [
                'nama_mahasiswa' => $item->mahasiswa->nama ?? '-',
                'jenis_surat' => 'Surat Pengantar',
                'status' => $item->status,
                'tanggal' => $item->created_at,
            ];
        });

        $semuaSurat = collect()
            ->merge($suratAktif)
            ->merge($suratKeterangan)
            ->merge($suratLaporan)
            ->merge($suratPengantar)
            ->sortByDesc('tanggal');

        return view('dashboard.kaprodi', compact('semuaSurat'));
    }
}
