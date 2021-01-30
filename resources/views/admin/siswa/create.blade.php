@extends('layouts.app', ['title' => 'Perpus | Siswa'])

@section('content')
    <!-- General elements -->
    <h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
  >
    Daftar Siswa
  </h4>
  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
  <form action="{{ route('admin.siswa.store') }}" method="post">
    @csrf
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">NISN</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="11806858" name="nisn" value="{{ old('nisn') }}" required autofocus
        />
        @error('nisn')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Kelas
        </span>
        <select
          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          name="classroom_id" required
        >
          <option disabled selected>Pilih Kelas</option>
          @foreach ($classrooms as $classroom)
            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
          @endforeach
        </select>
        @error('classroom_id')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
      </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Nama Depan</span>
      <input
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        placeholder="nama depan..." name="first_name" value="{{ old('first_name') }}" required
      />
      @error('first_name')
        <span>
            <strong style="color: red;">{{ $message }}</strong>
        </span>
      @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Nama Belakang</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="nama belakang..." name="last_name" value="{{ old('last_name') }}" required
        />
        @error('last_name')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
      </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Jenis Kelamin
      </span>
      <select
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
        name="gender" required
      >
        <option disabled selected>Pilih JK</option>
        <option value="0">Laki - Laki</option>
        <option value="1">Perempuan</option>
      </select>
      @error('gender')
        <span>
            <strong style="color: red;">{{ $message }}</strong>
        </span>
      @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Lahir Pada</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required
        />
        @error('date_of_birth')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
      </label>

    <div class="flex mt-6 text-sm">
      <label class="flex items-center dark:text-gray-400">
        <a href="{{ route('admin.siswa.index') }}" class="px-3 py-1 text-sm mr-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
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
