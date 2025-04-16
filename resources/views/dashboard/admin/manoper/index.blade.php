<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>

    <!-- Tailwind & Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
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
    <!-- Navbar -->
    <nav class="bg-cyan-300 p-4 flex justify-between items-center">
        <div class="flex items-center space-x-8">
            <img src="{{ asset('images/surat.png') }}" alt="Logo" class="w-20 h-10">
            <span class="text-lg font-semibold">Selamat datang, {{ Auth::user()->name }}!</span>
        </div>
        <!-- Profile Dropdown -->
        <div class="relative group">
            <div class="flex items-center space-x-1 cursor-pointer">
                <i class="fas fa-user-circle text-2xl"></i>
                <span>Profile</span>
            </div>
            <div class="absolute right-0 mt-2 w-32 bg-white rounded shadow-md hidden group-hover:block z-50">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-4 text-white">Dashboard Manager Operasional</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Id</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">NRP</th>
                    <th class="border px-4 py-2">Alamat</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mhs)
                <tr>
                    <td class="border px-4 py-2">{{ $mhs->id }}</td>
                    <td class="border px-4 py-2">{{ $mhs->nama }}</td>
                    <td class="border px-4 py-2">{{ $mhs->nrp }}</td>
                    <td class="border px-4 py-2">{{ $mhs->alamat }}</td>
                    <td class="border px-4 py-2">{{ $mhs->semester }}</td>
                    <td class="border px-4 py-2">{{ $mhs->fakultas }}</td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('mahasiswa.edit', ['id' => $mhs->id]) }}"
                            class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>

                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Yakin mau hapus?')">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach

                @if($mahasiswas->isEmpty())
                <tr>
                    <td colspan="7" class="text-center border px-4 py-4 text-gray-500">Belum ada data mahasiswa.</td>
                </tr>
                @endif
            </tbody>
        </table>
        <!-- Floating Add Button -->
        <div class="mt-6 flex justify-center">
            <a href="{{ route('mahasiswa.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white w-12 h-12 flex items-center justify-center rounded-full text-xl shadow-lg"> + </a>
        </div>
        </main>
    </div>
</body>

</html>