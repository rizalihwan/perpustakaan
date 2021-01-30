<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #040b14;">
    <a href="{{ route('siswa.index') }}"><b class="text-sm wlcm mr-3">Selamat Datang <small>{{ auth()->user()->name }}</small></b></a> <div class="mr-3 text-white">|</div>
    <button class="navbar-toggler" style="background-color: white;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <form action="{{ route('siswa.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input type="search" name="query" class="form-control mr-sm-2" placeholder="Cari buku" aria-label="Search" id="">
                <button type="submit" class="btn btn-info my-2 my-sm-0">Cari</button>
            </form>
        </li>
        <li class="nav-item dropdown form-inline my-2 my-lg-0">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Urutkan Sesuai
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" style="{{ request()->is('siswa/perpus') ? 'color: orange;' : '' }}" href="{{ route('siswa.index') }}">Default</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style="{{ request()->is('siswa/perpus/latest') ? 'color: orange;' : '' }}" href="{{ route('siswa.latest') }}">Terbaru</a>
                <a class="dropdown-item" style="{{ request()->is('siswa/perpus/ascending') ? 'color: orange;' : '' }}" href="{{ route('siswa.asc') }}">Abjad(A-Z)</a>
                <a class="dropdown-item" style="{{ request()->is('siswa/perpus/descending') ? 'color: orange;' : '' }}" href="{{ route('siswa.desc') }}">Abjad(Z-A)</a>
            </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategori
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                    <a class="dropdown-item" style="{{ request()->is('siswa/category_show/'.$category->id) ? 'color: orange;' : '' }}" href="{{ route('siswa.showcategory', $category->id) }}">{{ $category->name }}</a>
                @endforeach
          </div>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <a data-toggle="modal" data-target="#logoutModal" class="btn my-2 my-sm-0"><i class="fa fa-sign-out-alt" style="color: white;"></i> <u style="color: white;">Logout</u></a>
        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Font Welcome';">Informasi Pesan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" style="font-family: 'a-josep';">
                    Apakah Anda yakin ingin keluar dari aplikasi ? Jika yakin klik "Logout!"
                </div>
                <div class="modal-footer">
                <a href="" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
  </nav>
