@extends('layouts.app', ['title' => 'Perpus | Penerbit'])

@section('content')
    <a href="{{ route('admin.penerbit.create') }}"
        class="flex items-center justify-between px-4 py-2 mb-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
        style="width: 160px; background-color: rgb(29, 185, 29);">
        <i class="fa fa-plus"></i>
        <span style="font-size: 13px;">Tambah Penerbit</span>
    </a>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nama Penerbit</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                @forelse ($publishers as $publisher)
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <th class="px-4 py-3 text-sm">
                                {{ $loop->iteration + $publishers->firstItem() - 1 . '.' }}
                            </th>
                            <td class="px-4 py-3 text-sm">
                                {{ $publisher->name }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" href="{{ route('admin.penerbit.edit', $publisher->id) }}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete"
                                        onclick="deleteAlert('{{ $publisher->id }}', 'Menghapus Penerbit {{ $publisher->name }}')">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin.penerbit.destroy', $publisher->id) }}" method="post"
                                        id="Delete{{ $publisher->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="color: red; text-align: center; padding: 15px;">Data Penerbit Kosong!
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
                            {{ $publishers->links() }}
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
