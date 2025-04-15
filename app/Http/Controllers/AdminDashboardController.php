<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Motu;
use App\Models\Kaprodi;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jumlahMahasiswa = Mahasiswa::count();
        $jumlahMotu = Motu::count();
        $jumlahKaprodi = Kaprodi::count();

        return view('dashboard.admin', compact('jumlahMahasiswa', 'jumlahMotu', 'jumlahKaprodi'));
    }
}
