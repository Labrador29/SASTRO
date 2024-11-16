<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Absensi Alumni</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <a href="/" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-gray-500 text-lg">Absensi Alumni</span>
                    </a>
                </div>
                <div class="flex items-center space-x-3">
                    @auth
                    <a href="{{ route('dashboard') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Dashboard</a>
                    <a href="{{ route('events.index') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Acara</a>
                    <a href="{{ route('users.index') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Users</a>
                    <span class="text-gray-700">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
                    <a href="{{ route('register') }}" class="py-2 px-4 bg-green-500 text-white rounded hover:bg-green-600">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-6 px-4">
        @yield('content')
    </main>

</body>

</html>