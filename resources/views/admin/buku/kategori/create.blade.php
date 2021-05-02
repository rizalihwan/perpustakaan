@extends('layouts.app', ['title' => 'Perpus | Kategori'])

@section('content')
    <!-- General elements -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Daftar Kategori
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.kategori.store') }}" method="post">
            @csrf

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Kategori</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Kategori..." name="name" value="{{ old('name') }}" required autofocus />
                @error('name')
                    <span>
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                @enderror
            </label>

            <div class="flex mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                    <a href="{{ route('admin.kategori.index') }}"
                        class="px-3 py-1 text-sm mr-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        Kembali
                    </a>
                    <button
                        class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Simpan
                    </button>
                </label>
        </form>
    </div>
    </div>
@endsection
