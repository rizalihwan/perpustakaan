<aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="text-gray-500 dark:text-gray-400">
          <img src="{{ asset('logo/logoweb.png') }}" alt="" width="80px" style="margin: auto;">
        <ul class="mt-6">
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="{{ route('admin.dashboard') }}"
              >
              <i class="fas fa-home"></i> <span class="ml-4" style="{{ request()->is('admin/dashboard') ? 'color: blue; font-weight: bold;' : '' }}">Dashboard</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="{{ route('admin.pengguna.index') }}"
              >
                <i class="fas fa-users"></i> <span style="margin-left: 15px; {{ request()->is('admin/pengguna') || request()->is('admin/pengguna/create') ? 'color: blue; font-weight: bold;' : ''  }}">Pengguna</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesMenu"
                aria-haspopup="true"
              >

              <i class="fas fa-book"></i><span style="margin-left: -28px; {{ request()->is('admin/buku') || request()->is('admin/buku/create') || request()->is('admin/kategori') || request()->is('admin/kategori/create') || request()->is('admin/pengarang') || request()->is('admin/pengarang/create') || request()->is('admin/penerbit') || request()->is('admin/penerbit/create') ? 'color: blue; font-weight: bold;' : ''  }}">Manajemen Buku</span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template x-if="isPagesMenuOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="{{ route('admin.buku.index') }}" style="{{ request()->is('admin/buku') || request()->is('admin/buku/create') ? 'color: blue; font-weight: bold;' : ''  }}">Buku</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="{{ route('admin.kategori.index') }}" style="{{ request()->is('admin/kategori') || request()->is('admin/kategori/create') ? 'color: blue; font-weight: bold;' : ''  }}">
                      Kategori
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="{{ route('admin.pengarang.index') }}" style="{{ request()->is('admin/pengarang') || request()->is('admin/pengarang/create') ? 'color: blue; font-weight: bold;' : ''  }}">
                      Pengarang
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="{{ route('admin.penerbit.index') }}" style="{{ request()->is('admin/penerbit') || request()->is('admin/penerbit/create') ? 'color: blue; font-weight: bold;' : ''  }}">
                      Penerbit
                    </a>
                  </li>
                </ul>
              </template>
            </li>
            <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                  href="{{ route('admin.kelas.index') }}"
                >
                <i class="fas fa-id-card"></i> <span style="margin-left: 17px; {{ request()->is('admin/kelas') || request()->is('admin/kelas/create') ? 'color: blue; font-weight: bold;' : ''  }}">Kelas</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                  href="{{ route('admin.siswa.index') }}"
                >
                <i class="fas fa-user-graduate"></i> <span style="margin-left: 19px; {{ request()->is('admin/siswa') || request()->is('admin/siswa/create') ? 'color: blue; font-weight: bold;' : ''  }}">Siswa</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                  href="{{ route('admin.pinjam.index') }}"
                >
                <i class="fas fa-american-sign-language-interpreting"></i> <span style="margin-left: 14px; {{ request()->is('admin/pinjam') || request()->is('admin/pinjam/create') ? 'color: blue; font-weight: bold;' : ''  }}">Peminjaman</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                  href="{{ route('admin.fine') }}"
                >
                <i class="fas fa-money-bill-wave"></i> <span style="margin-left: 14px; {{ request()->is('admin/fine') ? 'color: blue; font-weight: bold;' : ''  }}">Denda</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                  href="{{ route('admin.laporan.peminjaman') }}"
                >
                <i class="fas fa-chart-line"></i> <span style="margin-left: 18px; {{ request()->is('admin/borrowing_report') || request()->is('admin/borrowing_report/search') ? 'color: blue; font-weight: bold;' : ''  }}">Laporan Peminjaman</span>
                </a>
            </li>
        </ul>
    </div>
    <center style="margin-top: 7rem;">
        <small style="font-family: 'Jetbrains_Mono';">&copy; 2021 Rizal Ihwan</small>
    </center>
</aside>
