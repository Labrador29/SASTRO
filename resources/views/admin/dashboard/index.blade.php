@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Daftar Acara</h1>
        @if (auth()->user()->role === 'admin')
        <a href="{{ route('admin.events.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Acara
        </a>
        @endif
    </div>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow-md rounded my-6">

    </div>
</div>
@endsection