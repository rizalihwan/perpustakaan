<!-- BREADCRUMB -->
      <div
        class="my-6 flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
      >
        <div class="flex items-center">
          <b>Menu</b>
        </div>
        @if (request()->is('admin/dashboard'))
            <i class="fa fa-home"> /
                <span>Dashboard</span>
            </i>
        @endif
        @if (request()->is('admin/pengguna'))
            <i class="fa fa-home"> /
                <span>Pengguna</span>
            </i>
        @endif
        @if (request()->is('admin/pengguna/create'))
        <i class="fa fa-home"> /
            <span>Pengguna</span> /
            <span>Create</span>
        </i>
        @endif
        @if (request()->is('admin/account/password'))
        <i class="fa fa-home"> /
            <span>User</span> /
            <span>Ganti Password</span>
        </i>
        @endif
        @if (request()->is('admin/buku'))
            <i class="fa fa-home"> /
                <span>Manajemen Buku</span> /
                <span>Buku</span>
            </i>
        @endif
        @if (request()->is('admin/kategori'))
            <i class="fa fa-home"> /
                <span>Manajemen Buku</span> /
                <span>Kategori</span>
            </i>
        @endif
        @if (request()->is('admin/pengarang'))
            <i class="fa fa-home"> /
                <span>Manajemen Buku</span> /
                <span>Pengarang</span>
            </i>
        @endif
        @if (request()->is('admin/penerbit'))
            <i class="fa fa-home"> /
                <span>Manajemen Buku</span> /
                <span>Penerbit</span>
            </i>
        @endif
        @if (request()->is('admin/kelas'))
        <i class="fa fa-home"> /
            <span>Kelas</span>
        </i>
        @endif
        @if (request()->is('admin/siswa'))
        <i class="fa fa-home"> /
            <span>Siswa</span>
        </i>
        @endif
        @if (request()->is('admin/pinjam'))
        <i class="fa fa-home"> /
            <span>Peminjaman</span>
        </i>
        @endif
        @if (request()->is('admin/borrowing_report') || request()->is('borrowing_report/search'))
        <i class="fa fa-home"> /
            <span>Laporan Peminjaman</span>
        </i>
        @endif
        @if (request()->is('admin/fine') || request()->is('borrowing_report/search'))
        <i class="fa fa-home"> /
            <span>Denda</span>
        </i>
        @endif
      </div>
