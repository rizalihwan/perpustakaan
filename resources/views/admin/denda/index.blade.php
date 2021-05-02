@extends('layouts.app', ['title' => 'Perpus | Denda'])

@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Denda Sebesar</th>
                        <th class="px-4 py-3">Telat (Hari)</th>
                        <th class="px-4 py-3">Kode Peminjaman</th>
                        <th class="px-4 py-3">Nama Siswa</th>
                        <th class="px-4 py-3">Nama Buku</th>
                    </tr>
                </thead>
                @forelse ($borrowings as $borrowing)
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <th class="px-4 py-3 text-sm">
                                {{ $loop->iteration + $borrowings->firstItem() - 1 . '.' }}
                            </th>
                            @php
                                $return = date_create($borrowing['return_date']);
                                $date = date_create(date('Y-m-d'));
                                $late = date_diff($return, $date);
                                $day = $late->format('%a');
                                // fine calculate
                                $fine = $day * 1000;
                            @endphp
                            <td class="px-4 py-3 text-sm">
                                {{ 'Rp ' . number_format($fine, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    {{ $day . ' Hari' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $borrowing->borrow_code }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $borrowing->student->FullName }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $borrowing->book->name }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="color: red; text-align: center; padding: 15px;">Data Denda Kosong!</td>
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
