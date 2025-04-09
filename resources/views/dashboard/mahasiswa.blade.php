<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex flex-col">

    <!-- Header with Logout Button -->
    <header class="flex justify-end p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                Logout
            </button>
        </form>
    </header>

    <!-- Main Content -->
    <main class="flex-1 py-10 px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Halo, {{ Auth::user()->name }} Selamat Datang</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Card Surat Aktif -->
            <a href="{{ route('surat.aktif.create') }}" class="p-6 bg-white rounded-lg shadow hover:bg-blue-50 transition">
                <h2 class="text-xl font-semibold text-blue-800">Surat Keterangan Mahasiswa Aktif</h2>
                <p class="text-gray-600 mt-2">Digunakan untuk keterangan bahwa mahasiswa masih aktif kuliah.</p>
            </a>

            <!-- Card Surat Rekomendasi -->
            <a href="#" class="p-6 bg-white rounded-lg shadow hover:bg-blue-50 transition">
                <h2 class="text-xl font-semibold text-blue-800">Surat Rekomendasi MBKM</h2>
                <p class="text-gray-600 mt-2">Digunakan untuk mendukung pendaftaran dan partisipasi mahasiswa dalam program MBKM, seperti Magang dan Studi Independen Bersertifikat (MSIB), dan kegiatan MBKM lainnya.</p>
            </a>

            <!-- Card Surat Keterangan -->
            <a href="{{ route('surat.keterangan') }}" class="p-6 bg-white rounded-lg shadow hover:bg-blue-50 transition">
                <h2 class="text-xl font-semibold text-blue-800">Surat Keterangan Lulus</h2>
                <p class="text-gray-600 mt-2">Digunakan untuk bukti sementara bahwa Anda telah dinyatakan lulus dan dapat digunakan untuk keperluan seperti melamar pekerjaan atau melanjutkan studi, sebelum ijazah resmi diterbitkan.</p>
            </a>

            <!-- Card Surat Rekomena -->
            <a href="{{ route('surat.pengantar') }}" class="p-6 bg-white rounded-lg shadow hover:bg-blue-50 transition">
                <h2 class="text-xl font-semibold text-blue-800">Surat Pengantar Tugas Mata Kuliah</h2>
                <p class="text-gray-600 mt-2">Digunakan untuk memperkenalkan mahasiswa yang melakukan penelitian ke instansi terkait, memastikan mereka resmi dari universitas, dan mempermudah administrasi, serta koordinasi.</p>
            </a>

            <!-- Card Surat Laporan -->
            <a href="{{ route('surat.hasil') }}" class="p-6 bg-white rounded-lg shadow hover:bg-blue-50 transition">
                <h2 class="text-xl font-semibold text-blue-800">Surat Laporan Hasil Studi</h2>
                <p class="text-gray-600 mt-2">Surat keterangan mencatat dan merekam hasil belajar mahasiswa selama satu semester, dan menjadi dasar untuk membuat transkrip, serta menentukan kelulusan dan kelayakan untuk mendapatkan gelar.</p>
            </a>
        </div>
    </main>
</body>

</html>