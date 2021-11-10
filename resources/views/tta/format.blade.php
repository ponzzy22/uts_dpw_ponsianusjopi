<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>UTS &mdash; Ponsianus Jopi</title>
  
  <link rel="stylesheet" href="{{ asset('assets_a/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_a/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_a/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_a/modules/codemirror/lib/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_a/modules/codemirror/theme/duotone-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_a/modules/jquery-selectric/selectric.css') }}"> 
  <link rel="stylesheet" href="{{ asset('assets_a/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_a/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_a/modules/fullcalendar/fullcalendar.min.css') }}">

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-94034622-3');
  </script>
</head>

<body>
  
  {{-- NAVIGASI ATAS --}}
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">

        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>          
        </form>  
        
        {{-- menu auth --}}
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block"><i class="fas fa-cog"></i></div></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">{{ __('Profil') }}</a>
              <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
          </li>
        </ul>
      </nav>
      
@include('tta.navkiri')

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1> @yield('sub-judul') </h1>
          </div>

@yield('isi')

          <div class="section-body">
          </div>
        </section>
      </div>
      
@include('tta.kaki')