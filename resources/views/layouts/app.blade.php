<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Sasdik Scout | Admin</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex items-center space-x-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Dashboard</a>
                        <a href="{{ route('admin') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Dashboard 2</a>
                        <a href="{{ route('events.index') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Acara</a>
                        <a href="{{ route('users.index') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Users</a>
                        <a href="{{ route('bidang.index') }}" class="py-2 px-4 text-gray-700 hover:text-gray-900">Bidang</a>
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

    <main class="max-w-6xl mx-auto mt-6 px-4">
        @yield('content')
    </main>

</body>

</html>
