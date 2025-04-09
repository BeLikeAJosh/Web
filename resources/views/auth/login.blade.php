{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Surat Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-2xl rounded-2xl flex max-w-4xl w-full overflow-hidden">
        <!-- Foto -->
        <div class="w-1/2 bg-gray-700 text-white p-10 flex flex-col justify-center items-center">
            <img src="{{ asset('images/surat.png') }}" alt="Surat Ilustrasi" class="w-3/4 mb-6">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang</h2>
            <p class="text-center">Sistem Pengajuan Surat Mahasiswa<br>Silakan login untuk melanjutkan</p>
        </div>

        <!-- Form Login -->
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold text-black-800 mb-6 text-center">Login</h2>

            @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="example@gmail.com">
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2 mt-1" placeholder="password">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember me -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-600">Remember me</label>
                </div>

                <!-- Submit -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-green-800 hover:bg-green-900 text-white py-2 rounded">Login</button>
                </div>
            </form>

            <!-- Forgot password -->
            <div class="text-center mb-4">
                <a href="{{ route('password.request') }}" class="text-sm text-blue-700 hover:underline">Lupa Password?</a>
            </div>

            <!-- Register -->
            <div class="mt-6 text-center">
                <span class="text-gray-600">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline font-semibold">
                    Daftar Sekarang
                </a>
            </div>

        </div>
    </div>
</body>

</html>