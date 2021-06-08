<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      @if(Auth::user()->role != 'admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('disposisi') }}">
          <i class="mdi mdi-human-greeting menu-icon"></i>
          <span class="menu-title">Disposisi</span>
        </a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Beranda</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-database menu-icon"></i>
          <span class="menu-title">Data Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('jabatan.index') }}">Jabatan</a></li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('klasifikasi-surat.index') }}">Klasifikasi Surat</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('surat-masuk.index') }}">
          <i class="mdi mdi-package-down menu-icon"></i>
          <span class="menu-title">Surat Masuk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('surat-keluar.index') }}">
          <i class="mdi mdi-package-up menu-icon"></i>
          <span class="menu-title">Surat Keluar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pengguna.index') }}">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Manajemen Pengguna</span>
        </a>
      </li>
      @endif
    </ul>
  </nav>