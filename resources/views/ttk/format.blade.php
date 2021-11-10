@include('ttk.navatas')

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">

            <li class="nav-item dropdown nav-item active">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown beep"><i class="fas fa-globe"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link">Admin Web</a></li>
                <li class="nav-item"><a href="{{ url('klien') }}" class="nav-link">Klien Web</a></li>
              </ul>
            </li>
            
            <li class="nav-item dropdown nav-item active">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown beep"><i class="fas fa-stroopwafel"></i><span> Kategori </span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="{{ url('kategori') }}" class="nav-link">Semua Kategori</a></li>            
              </ul>
            </li>

            <li class="nav-item dropdown nav-item active">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown beep"><i class="fas fa-toolbox"></i><span> Artikel </span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="{{ url('artikel') }}" class="nav-link">Semua Artikel</a></li>                        
              </ul>
            </li>            
          </ul>
       </div>        
      </nav>

<div class="main-content">
  <section class="section">
    <div class="section-body"> @yield('isi') </div>
  </section>
</div>

@include('ttk.kaki')
      