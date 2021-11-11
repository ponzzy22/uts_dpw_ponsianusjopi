@extends('ttk.format1')
@section('isi')





<div class="row">
        

          @foreach ($post as $post)
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
              <div class="article-header">
                <div class="article-image" data-background="{{ $post->gambar }}">
                </div>
                <div class="article-title">
                  <h2><a href="#">{{ $post->judul }}</a></h2>
                </div>
              </div>
              <div class="article-details">
                {{-- <p>{{ $post->users->name }}</p> --}}
                <div class="article-cta">
                  <a href="{{ route('detail', $post->id) }}" class="btn btn-primary">Lihat</a>
                </div>
              </div>
            </article>
          </div>
          @endforeach
          
        </div>
      </div>

@endsection