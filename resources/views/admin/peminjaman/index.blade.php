@extends('layouts.app', ['title' => 'Perpus | Peminjaman'])

@section('content')
    <a href="{{ route('admin.pinjam.create') }}"
        class="flex items-center justify-between px-4 py-2 mb-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
        style="width: 170px; background-color: rgb(29, 185, 29);">
        <i class="fa fa-plus"></i>
        <span style="font-size: 13px;">Tambah Pinjaman</span>
    </a>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Kode Peminjaman</th>
                        <th class="px-4 py-3">Nama Siswa</th>
                        <th class="px-4 py-3">Nama Buku</th>
                        <th class="px-4 py-3">Tanggal Pinjam</th>
                        <th class="px-4 py-3">Tanggal Kembali</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                @forelse ($borrowings as $borrowing)
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <th class="px-4 py-3 text-sm">
                                {{ $loop->iteration + $borrowings->firstItem() - 1 . '.' }}
                            </th>
                            <td class="px-4 py-3 text-sm">
                                {{ $borrowing->borrow_code }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $borrowing->student->FullName }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $borrowing->book->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $borrowing->borrow_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $borrowing->return_date }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                        onclick="deleteAlert('{{ $borrowing->id }}', 'Menghapus Peminjaman Buku {{ $borrowing->book->name }}, yang dipinjam oleh siswa {{ $borrowing->student->FullName }}')"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                        Kembali
                                    </button>
                                    <form action="{{ route('admin.pinjam.destroy', $borrowing->id) }}" method="post"
                                        id="Delete{{ $borrowing->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="{{ route('admin.pinjam.edit', $borrowing->id) }}" style="margin-left: -9px;"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Perpanjang
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="color: red; text-align: center; padding: 15px;">Data Peminjaman Kosong!
                            </td>
                        </tr>
                    </tbody>
                @endforelse
            </table>
        </div>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <li>
                            {{ $borrowings->links() }}
                        </li>
                    </ul>
                </nav>
            </span>
        </div>
    </div>
@endsection
@section('script')
@include('alert.delete')
@endsection
