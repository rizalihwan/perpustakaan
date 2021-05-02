@extends('layouts.app', ['title' => 'Perpus | Laporan'])

@section('content')
    <a href="{{ route('admin.laporan.generate.pdf') . '?borrow_date=' . request('borrow_date') }}" target="_blank"
        class="flex items-center justify-between px-4 py-2 mb-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
        style="width: 120px;">
        <i class="fa fa-print"></i>
        <span style="font-size: 13px;">Print PDF</span>
    </a>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span>Cari berdasarkan Tanggal Pinjam :</span>
        <div class="relative">
            <form action="{{ route('admin.laporan.peminjaman.search') }}" method="get">
                <input
                    class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    type="date" name="borrow_date" required />
                <button
                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Cari
                </button>
            </form>
        </div>
    </label>
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
                    </tr>
                </thead>
                @if (request('borrow_date'))
                    @forelse ($borrowings as $borrowing)
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr class="text-gray-700 dark:text-gray-400">
                                <th class="px-4 py-3 text-sm">
                                    {{ $autoNum++ . '.' }}
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="color: red; text-align: center; padding: 15px;">Laporan Peminjaman
                                    pada <b>{{ request('borrow_date') }}</b> Kosong!</td>
                            </tr>
                        </tbody>
                    @endforelse
                @else
                    <tr>
                        <td colspan="6" style="color: red; text-align: center; padding: 15px;">Silahkan untuk mecari Laporan
                            berdasarkan Tanggal Peminjaman</td>
                    </tr>
                @endif
            </table>
        </div>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        </div>
    </div>
@endsection
