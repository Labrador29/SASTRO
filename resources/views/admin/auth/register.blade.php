@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-lg w-full bg-white shadow-md rounded px-10 pt-6 pb-8 mb-4">
            <h2 class="text-3xl font-semibold text-center text-black mb-1">
                <a href="{{ route('home') }}" class="flex justify-between items-center w-full">
                    <i class="fas fa-arrow-left text-gray-700 ml-0"></i> <!-- Icon in the left corner -->
                    <span class="mx-auto">Register</span> <!-- Center the text -->
                </a>
            </h2>
            <p class="text-gray-600 text-center mb-6">Enter your email and password</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nama Lengkap <span class="text-red-500">*</span> <!-- Red asterisk -->
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                        @error('name') border-red-500 @enderror"
                        id="name" type="text" name="name" value="{{ old('name') }}" required>

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email <span class="text-red-500">*</span> <!-- Red asterisk -->
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                        @error('email') border-red-500 @enderror"
                        id="email" type="email" name="email" value="{{ old('email') }}" required>

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password <span class="text-red-500">*</span> <!-- Red asterisk -->
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                        @error('password') border-red-500 @enderror"
                        id="password" type="password" name="password" required>

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                        Konfirmasi Password <span class="text-red-500">*</span> <!-- Red asterisk -->
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                        @error('password_confirmation') border-red-500 @enderror"
                        id="password_confirmation" type="password" name="password_confirmation" required>

                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Angkatan -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="angkatan">
                        Tahun Angkatan <span class="text-red-500">*</span>
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                        @error('angkatan') border-red-500 @enderror"
                        id="angkatan" name="angkatan" required>
                        @php
                            $currentYear = now()->year;
                        @endphp
                        @for ($year = $currentYear - 30; $year <= $currentYear; $year++)
                            <!-- Rentang 30 tahun -->
                            <option value="{{ $year }}" @if (old('angkatan') == $year) selected @endif>
                                {{ $year }}</option>
                        @endfor
                    </select>
                    <p class="text-gray-600 text-sm mt-1">
                        Pilih tahun di mana Anda pertama kali bergabung dengan dewan.
                    </p>

                    @error('angkatan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <div class="flex justify-center mb-4">
                        <button
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 ease-in-out w-full"
                            type="submit">
                            Register
                        </button>
                    </div>

                    <div class="text-center">
                        <a class="inline-block align-baseline font-semibold text-sm text-black"
                            href="{{ route('login') }}">
                            Belum punya akun?
                        </a>
                        <a class="inline-block align-baseline font-semibold text-sm text-blue-500"
                            href="{{ route('login') }}">
                            <u> Login Sekarang </u>
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
