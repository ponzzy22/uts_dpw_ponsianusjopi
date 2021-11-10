@extends('tta.format')
@section('sub-judul','  BERANDA ADMIN')
@section('isi')

<div class="col-12 mb-4">
    <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('public/uploads/posts/1636173146jisoo-blackpink-ice-cream-uhdpaper.com-4K-7.2612.jpg');">
        <div class="hero-inner">
          <h2>Welcome,  {{ Auth::user()->name }}!!!</h2>
            <p class="lead">Selamat Datang di Blog!!, ayo mulai menulis artikel yang menurut anda menarik</p>
        </div>
    </div>
  </div>     
  
  <div class="col-12 mb-4">
    <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('public/uploads/posts/1636173146jisoo-blackpink-ice-cream-uhdpaper.com-4K-7.2612.jpg');">
        <div class="hero-inner">
          <h2></h2>
            <p class="lead"></p>
              <div class="mt-4">
                <a href="{{ route('client') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-home"></i> Blog Beranda</a>
                 <a href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-edit"></i>Logout</a>
                 <br><br><br><br><br>     
            </div>
        </div>
    </div>
  </div>  
  


@endsection