<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kaprodi</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-cyan-300 p-4 flex justify-between items-center">
        <div class="flex items-center space-x-8">
            <img src="{{ asset('images/surat.png') }}" alt="Logo" class="w-10 h-10">
            <span class="text-lg font-semibold">Selamat datang, {{ Auth::user()->name }}!</span>
        </div>
        <div class="relative group">
            <div class="flex items-center space-x-1 cursor-pointer">
                <i class="fas fa-user-circle text-2xl"></i>
                <span>Profile</span>
            </div>
            <div class="absolute right-0 mt-2 w-32 bg-white rounded shadow-md hidden group-hover:block z-50">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Pengajuan Surat Mahasiswa</h2>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Id</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">NRP</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Jenis Surat</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($semuaSurat as $surat)
                <tr>
                    <td class="border px-4 py-2">{{ $surat['id'] }}</td>
                    <td class="border px-4 py-2">{{ $surat['nama'] }}</td>
                    <td class="border px-4 py-2">{{ $surat['nrp'] }}</td>
                    <td class="border px-4 py-2">{{ $surat['email'] }}</td>
                    <td class="border px-4 py-2">{{ $surat['jenis_surat'] }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($surat['status']) }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ $surat['route'] }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Lihat</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center border px-4 py-4 text-gray-500">Tidak ada surat yang diajukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>