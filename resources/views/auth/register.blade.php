{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Sistem Surat Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-2xl rounded-2xl flex max-w-md w-full p-10">
        <!-- Form Register -->
        <div class="w-full">
            <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Daftar Akun</h2>

            @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Kata Sandi</label>
                    <input id="password" type="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
                    @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-800 hover:bg-blue-900 text-white py-2 rounded">Daftar</button>
                </div>
            </form>

            <!-- Login -->
            <div class="mt-6 text-center">
                <span class="text-gray-600">Sudah punya akun?</span>
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline font-semibold">
                    Login Sekarang
                </a>
            </div>

        </div>
    </div>
</body>

</html>