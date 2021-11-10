@extends('ttk.format')
@section('sub-title','Beranda')
@section('sub-title1','asulah')
@section('sub-title2','asulah')
@section('sub-title3 ','asulah')

@section('isi')
  

            <h2 class="section-title">Artikel Terbaru</h2>
            <div class="row">
              @foreach ($data as $hasil)

              <div class="col-12 col-md-4 col-lg-4">                                  
                <article class="article article-style-c">
                  <div class="article-header">
                    <a href="{{ url('detail', $hasil->id) }}">
                    <div class="article-image" data-background="{{ asset($hasil->gambar) }}">
                    </div></a>
                  </div>
                  <div class="article-details">
                    <div class="article-category"><a href="#">{{ $hasil->category->name }}</a> <div class="bullet"></div> <a href="#">{{ $hasil->created_at->diffforHumans() }}</a></div>
                    <div class="article-title">
                      <h2><a href="#">{{ $hasil->judul }}</a></h2>
                    </div>
                    <div class="article-user">
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <a href="#">{{ $hasil->users->name }}</a>
                        </div>
                        <div class="text-job">
                          @if ($hasil->users->tipe)
                          <span class="badge badge-info">Administrator</span>
                              @else 
                              <span class="badge badge-warning">Client</span>
                          @endif  
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
              @endforeach             
            </div>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">                
                <div class="card">
                  <div class="card-header">
                    <h4>Artikel</h4>
                  </div>
                  <div class="card-body">                    
                    <ul class="list-unstyled">

                      @foreach ($data1 as $hasil)                                              
                      <li class="media">
                        <a href="{{ url('detail', $hasil->id) }}">
                        <img class="mr-3" src="{{ asset($hasil->gambar) }}" style="width: 200px" alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">{{ $hasil->judul }}</h5>
                        </a>
                          <span class="badge badge-primary badge-pill">{{ $hasil->users->name }}</span>
                        </div>
                      </li>
                      <hr>
                      @endforeach
                      
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Kategori</h4>
                  </div>
                  <div class="card-body">

                    @foreach ($category as $hasil)                
                    <ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between align-items-center"> <a href="{{ url('list_kategori') }}">{{ $hasil->name }}</a>                       
                        <span class="badge badge-primary badge-pill">{{ $hasil->post->count() }}</span>
                      </li>       
                    </ul>
                  @endforeach

                  </div>
                </div>                
              </div>
            </div>          

@endsection
