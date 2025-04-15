<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Mahasiswa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">
    <div class="absolute top-4 left-4">
        <a href="{{ route('admin.dashboard') }}">
            <button class="flex items-center bg-white-800 hover:bg-gray-400 text-black py-2 px-4 rounded-lg shadow transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l6-6m-6 6l6 6" />
                </svg>
                Back
            </button>
        </a>
    </div>
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-xl">
        <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">Tambah Mahasiswa</h1>

        <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama</label>
                <input type="text" name="nama" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">NRP</label>
                <input type="text" name="nrp" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Alamat</label>
                <input type="text" name="alamat" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Semester</label>
                <input type="number" name="semester" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Fakultas</label>
                <input type="text" name="fakultas" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('mahasiswa.dashboard') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>

</body>

</html>