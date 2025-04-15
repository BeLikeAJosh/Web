<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaprodiDashboardController extends Controller
{
    public function index()
    {
        $aktif = \App\Models\SuratAktif::with('user')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->user->name,
                'nrp' => $item->user->mahasiswa->nrp ?? '-',
                'email' => $item->user->email,
                'jenis_surat' => 'Surat Aktif',
                'status' => $item->status,
                'route' => route('kaprodi.surat.aktif.show', $item->id),
            ];
        });

        $keterangan = \App\Models\SuratKeterangan::with('user')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->user->name,
                'nrp' => $item->user->mahasiswa->nrp ?? '-',
                'email' => $item->user->email,
                'jenis_surat' => 'Surat Keterangan',
                'status' => $item->status,
                'route' => route('kaprodi.surat.keterangan.show', $item->id),
            ];
        });

        $laporan = \App\Models\SuratLaporan::with('user')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->user->name,
                'nrp' => $item->user->mahasiswa->nrp ?? '-',
                'email' => $item->user->email,
                'jenis_surat' => 'Surat Laporan',
                'status' => $item->status,
                'route' => route('kaprodi.surat.laporan.show', $item->id),
            ];
        });

        $pengantar = \App\Models\SuratPengantar::with('user')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->user->name,
                'nrp' => $item->user->mahasiswa->nrp ?? '-',
                'email' => $item->user->email,
                'jenis_surat' => 'Surat Pengantar',
                'status' => $item->status,
                'route' => route('kaprodi.surat.pengantar.show', $item->id),
            ];
        });

        $semuaSurat = collect()
            ->merge($aktif)
            ->merge($keterangan)
            ->merge($laporan)
            ->merge($pengantar);

        return view('kaprodi.dashboard', compact('semuaSurat'));
    }

    public function updateStatus(Request $request)
    {
        // Menentukan model surat berdasarkan jenis surat
        $surat = null;
        switch ($request->jenis_surat) {
            case 'Surat Aktif':
                $surat = \App\Models\SuratAktif::findOrFail($request->id);
                break;
            case 'Surat Keterangan':
                $surat = \App\Models\SuratKeterangan::findOrFail($request->id);
                break;
            case 'Surat Laporan':
                $surat = \App\Models\SuratLaporan::findOrFail($request->id);
                break;
            case 'Surat Pengantar':
                $surat = \App\Models\SuratPengantar::findOrFail($request->id);
                break;
            default:
                return redirect()->back()->with('error', 'Jenis surat tidak valid.');
        }

        // Update status surat
        $surat->status = $request->status;
        $surat->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Status surat berhasil diperbarui.');
    }
}
