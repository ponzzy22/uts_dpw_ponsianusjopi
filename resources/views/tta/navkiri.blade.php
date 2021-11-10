{{-- NAMA NAVIGASI --}}
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('admin') }}">{{ Auth::user()->name }} </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('admin') }}"><i class="fas fa-eye"></i></a>
      </div>

      {{-- ISI NAVIGASI KIRI --}}
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
          <a href="{{ route('posts.index') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-globe"></i> <span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-user-secret"></i>Admin Website</a></li>
            <li><a class="nav-link" href="{{ url('klien') }}"><i class="fas fa-user"></i>Klien Website</a></li>
            <li><a class="nav-link" href="{{ url('http://localhost/phpmyadmin/index.php?route=/sql&db=uts_ponsianusjopi&table=posts&pos=0') }}" ><i class="fas fa-database"></i>Mysql</a></li>
          </ul>
        </li>
    
        <li class="menu-header">DATA saya</li>
        <li class="dropdown">
          <a href="{{ route('posts.index') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-toolbox"></i> <span>Artikel</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('posts.index') }}"><i class="fas fa-list"></i>List</a></li>
            <li><a class="nav-link" href="{{ route('posts.create') }}"><i class="fas fa-plus"></i>Tambah</a></li>
            <li><a class="nav-link" href="{{ url('posts/hapus') }}" ><i class="fas fa-trash"></i>Sampah </a></li>
            <li><a class="nav-link" href="{{ url('http://localhost/phpmyadmin/index.php?route=/sql&db=uts_ponsianusjopi&table=posts&pos=0') }}" ><i class="fas fa-save"></i>Database</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="{{ route('category.index') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stroopwafel"></i> <span>Kategori</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-list"></i>List</a></li>
            <li><a class="nav-link" href="{{ route('category.create') }}"><i class="fas fa-plus"></i>Tambah</a></li>
            <li><a class="nav-link" href="{{ url('http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=uts_ponsianusjopi&table=category&pos=0') }}" ><i class="fas fa-save"></i>Database</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-address-book"></i> <span>Pengguna</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-list"></i>List</a></li>
            <li><a class="nav-link" href="{{ route('users.create') }}"><i class="fas fa-plus"></i>Tambah</a></li>
          </ul>
        </li>        
      </aside>
  </div>