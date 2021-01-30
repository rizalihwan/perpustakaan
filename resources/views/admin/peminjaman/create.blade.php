@extends('layouts.app', ['title' => 'Perpus | Peminjaman'])

@section('content')
    <!-- General elements -->
    <h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
  >
    Daftar Peminjaman Buku
  </h4>
  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
  <form action="{{ route('admin.pinjam.store') }}" method="post">
    @csrf

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Kode Peminjaman</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="PNJ-XXXX" name="borrow_code" value="{{ $kode }}" readonly required
        />
        @error('borrow_code')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Nama Siswa
        </span>
        <select
          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          name="student_id" required
        >
          <option disabled selected>Pilih Nama Siswa</option>
          @foreach ($students as $student)
            <option value="{{ $student->id }}">{{ $student->FullName }}</option>
          @endforeach
        </select>
        @error('student_id')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Nama Buku
        </span>
        <select
          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          name="book_id" required
        >
          <option disabled selected>Pilih Nama Buku</option>
          @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->book_code . " - " . $book->name }}</option>
          @endforeach
        </select>
        @error('book_id')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Tanggal Pinjam</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          type="date" name="borrow_date" value="{{ old('borrow_date') }}" required
        />
        @error('borrow_date')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Tanggal Kembali</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          type="date" name="return_date" value="{{ old('return_date') }}" required
        />
        @error('return_date')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <div class="flex mt-6 text-sm">
      <label class="flex items-center dark:text-gray-400">
        <a href="{{ route('admin.pinjam.index') }}" class="px-3 py-1 text-sm mr-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
            Kembali
        </a>
        <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Simpan
        </button>
      </label>
    </form>
    </div>
  </div>
@endsection
