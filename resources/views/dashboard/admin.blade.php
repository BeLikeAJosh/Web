<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Tailwind & Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-grey-50">
    <!-- Navbar -->
    <nav class="bg-black-300 p-4 flex justify-between items-center">
        <div class="flex items-center space-x-8">
            <img src="{{ asset('images/surat.png') }}" alt="Logo" class="w-20 h-10">
            <span class="text-lg font-semibold">Selamat datang, {{ Auth::user()->name }}!</span>
        </div>
        <!-- Profile Dropdown -->
        <div class="relative group">
            <div class="flex items-center space-x-2 cursor-pointer">
                <i class="fas fa-user-circle text-2xl"></i>
                <span>{{ Auth::user()->name }}</span>
            </div>
            <div class="absolute right-0 mt-2 w-32 bg-white rounded shadow-md hidden group-hover:block z-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Dashboard Cards -->
    <div class="container mx-auto px-4 py-8 flex flex-col items-center space-y-8">
        <div class="flex flex-col md:flex-row gap-8 justify-center">
            <!-- Mahasiswa Card -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center w-72">
                <div class="w-32 h-32 mx-auto bg-gray-200 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-user text-6xl text-gray-600"></i>
                </div>
                <p class="text-xl mb-4">Jumlah: #</p>
                <a href="{{ route('mahasiswa.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                    Edit Mahasiswa
                </a>
            </div>

            <!-- MO/TU Card -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center w-72">
                <div class="w-32 h-32 mx-auto bg-gray-200 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-users text-6xl text-gray-600"></i>
                </div>
                <p class="text-xl mb-4">Jumlah: #</p>
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                    Edit MO/TU
                </a>
            </div>
        </div>

        <!-- Kaprodi (ditengah) -->
        <div class="flex justify-center">
            <div class="bg-white rounded-lg shadow-md p-6 text-center w-72">
                <div class="w-32 h-32 mx-auto bg-gray-200 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-user-tie text-6xl text-gray-600"></i>
                </div>
                <p class="text-xl mb-4">Jumlah: #</p>
                <a href="{{ route('kaprodi.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                    Edit Kaprodi
                </a>
            </div>
        </div>
    </div>
</body>

</html>