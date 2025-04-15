<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Kaprodi</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-green-100 to-green-300 min-h-screen flex items-center justify-center">
    <div class="absolute top-4 left-4">
        <a href="{{ route('kaprodi.index') }}">
            <button class="flex items-center bg-white-800 hover:bg-gray-400 text-black py-2 px-4 rounded-lg shadow transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l6-6m-6 6l6 6" />
                </svg>
                Kembali
            </button>
        </a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-xl">
        <h1 class="text-3xl font-bold text-green-700 mb-6 text-center">Edit Kaprodi</h1>

        <form action="{{ route('kaprodi.update') }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Hidden ID -->
            <input type="hidden" name="id" value="{{ $kaprodi->id }}">

            <!-- Data Dosen -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama</label>
                <input type="text" name="Nama" value="{{ old('Nama', $kaprodi->Nama) }}" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $kaprodi->nik) }}" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Jabatan</label>
                <input type="text" name="Jabatan" value="{{ old('Jabatan', $kaprodi->Jabatan) }}" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nomor HP</label>
                <input type="text" name="nomor_hp" value="{{ old('nomor_hp', $kaprodi->nomor_hp) }}" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email Pribadi</label>
                <input type="email" name="Email" value="{{ old('Email', $kaprodi->Email) }}" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400" required>
            </div>

            <!-- Data Login (User) -->
            <hr class="border-t border-green-300 my-4">

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email Login</label>
                <input type="email" name="email_login" value="{{ old('email', $users->user->email ?? '') }}" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Password Baru</label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400" placeholder="Masukkan password baru jika ingin mengubah">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password login.</small>
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('kaprodi.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Update</button>
            </div>
        </form>
    </div>
</body>

</html>