<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Tugas Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="absolute top-4 left-4">
        <a href="{{ route('mahasiswa.dashboard') }}">
            <button class="flex items-center bg-white-800 hover:bg-gray-400 text-black py-2 px-4 rounded-lg shadow transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l6-6m-6 6l6 6" />
                </svg>
                Back
            </button>
        </a>
    </div>

    <div class="max-w-2xl w-full p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-blue-800 text-center">Form Surat Pengantar Tugas Mata Kuliah</h1>

        <form method="POST" action="{{ route('surat.aktif.store') }}">
            @csrf

            <!-- Tujukan surat -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Surat Tujuan</label>
                <input type="text" name="alamat" class="w-full px-4 py-2 border rounded" placeholder="Ibu x; Kepala perusahaan x; alamat">
            </div>

            <!-- Nama & Kode Matkul -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                <input type="text" name="alamat" class="w-full px-4 py-2 border rounded" placeholder="Prosbis - IN255">
            </div>

            <!-- Semester -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Semester</label>
                <select name="semester" class="w-full px-4 py-2 border rounded bg-white">
                    @for ($i = 1; $i <= 14; $i++)
                        <option value="{{ $i }}">Semester {{ $i }}</option>
                        @endfor
                </select>
            </div>

            <!-- Data Mahasiswa -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Data Mahasiswa</label>
                <input type="text" name="alamat" class="w-full px-4 py-2 border rounded" placeholder="Mahasiswa (nama) - 23720xx">
            </div>

            <!-- Tujuan -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Tujuan</label>
                <input type="text" name="keperluan" class="w-full px-4 py-2 border rounded" placeholder="...">
            </div>

            <!-- Topik -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Topik</label>
                <input type="text" name="keperluan" class="w-full px-4 py-2 border rounded" placeholder="...">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition duration-200">
                Ajukan Surat
            </button>
        </form>
    </div>
</body>

</html>