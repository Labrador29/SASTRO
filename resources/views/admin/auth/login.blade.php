<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('icons/da.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sasdik Scout | Admin</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <nav class="bg-white shadow-lg w-full fixed top-0 left-0">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex items-center space-x-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Dashboard</a>
                        <a href="{{ route('events.index') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Acara</a>
                        <a href="{{ route('users.index') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Users</a>
                        <span class="text-gray-700">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="flex items-center justify-center w-full h-full">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-3xl font-semibold text-center text-black mb-1">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <i class="fas fa-arrow-left text-gray-700"></i>
                    <span>Welcome Back Ksatria!</span>
                </a>
            </h2>
            <p class="text-gray-600 text-center mb-6">Masukkan Email dan Password</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input
                        class="shadow-md appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="email" type="email" name="email" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input
                        class="shadow-md appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="password" type="password" name="password" required>
                </div>

                @error('email')
                    <p class="text-red-500 text-xs italic mb-4">{{ $message }}</p>
                @enderror

                <div class="flex justify-center mb-4">
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out w-full"
                        type="submit">
                        Login
                    </button>
                </div>

                <div class="text-center">
                    <a class="inline-block align-baseline font-semibold text-sm text-black"
                        href="{{ route('register') }}">
                        Belum punya akun?
                    </a>
                    <a class="inline-block align-baseline font-semibold text-sm text-blue-500"
                        href="{{ route('register') }}">
                        <u> Daftar Sekarang </u>
                    </a>
                </div>
            </form>
        </div>
    </main>

</body>

</html>
