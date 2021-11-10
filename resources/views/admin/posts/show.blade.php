@extends('tta.format')
@section('sub-judul','Detail Artikel')
@section('isi')

<a href="{{ url('posts') }}" class="btn btn-warning">Kembali</a>

<br><br>
{{-- <form action="{{ route('posts.show', $post->id) }}" method="get" > --}}
<div class="card">
  <div class="card-body"> 
    <div class="form-group">
        <label>Judul Artikel </label>
        <h5>{{ $post->judul }}</h5>
    </div>
    
    <div class="form-group">
        <label>Kategori </label>
        <h5>{{ $post->category->name }}</h5>       
    </select>       
    </div>

    <div class="form-group">
        <label>Konten</label>
        <h5>{{ $post->content }}</h5>
    </div>

    <div class="form-group">
        <label>Penulis</label>
        <h5>{{ $post->users->name }}</h5>     
    </div>
    
    <div class="form-group">
        <label></label>
        <img src="{{ asset($post->gambar) }}" class="img-fluid" style="width: 200px ">
    </div>
  </div>
</div>
    
    <div class="form-group">
    </div>
    {{-- </form> --}}

    <br><br><br>
    <hr>

    <div class="row">
        <div class="col-12">
          <div class="card">
              
            <form action="{{ url('posts/komentar') }}" id="komentar-utama" method="POST" enctype="multipart/form-data">
                @csrf
            <input type="hidden" name="posts_id" value="{{ $post->id }}">
            <input type="hidden" name="parent" value="0">

            <div class="card-header">
              <h4>Komentar</h4>
            </div>            
              <div class="form-group">
                <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Tuliskan Komentar Kamu</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="col-md-10" name="konten" id="komentar-utama"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Publish</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>


      <div class="card">
        <div class="card-header">
          <h4>Daftar Kolom Komentar</h4>
        </div>
        <div class="card-body">             
          <ul class="list-unstyled list-unstyled-border">
            
            @foreach ($post->komentar()->where('parent',0)->orderBy('created_at','desc')->get() as $komentar)
            <li class="media">
              <div class="media-body">
                <div class="float-right text-small text-muted ">{{ $komentar->created_at->diffforHumans() }}</div>
                <div class="media-title">{{ $komentar->konten }}</div>
                <span class="text-primary">{{ $komentar->users->name }}</span>

                
              <form action="{{ url('posts/komentar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="posts_id" value="{{ $post->id }}">
                <input type="hidden" name="parent" value="{{ $komentar->id }}">
                <input type="text" name="konten" class="form-control">
                <input type="submit" class="btn btn-info btn-xs" value="balas">
              </form>
              
              <br>

              @foreach ($komentar->childs as $child)
              <p>
                <a href="#" class="text-primary">{{ $child->users->name }}</a>
                <span class="media-title"><i class="fas fa-share"></i>{{ $child->konten }}</span>
                <span class="text-small text-muted float-right">{{ $child->created_at->diffforHumans() }}</span>
              </p>
              @endforeach

            </div>

            <form action="{{ url('komentar/clean', $komentar->id) }}" method="POST" onsubmit="return confirm('Yakin kan aku')">
              @csrf
              @method('delete')
              <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-window-close"></i></button>
          </form>



              
            </li>   
            @endforeach
          </ul>
        </div>
      </div>

@endsection
