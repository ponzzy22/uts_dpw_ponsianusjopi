@extends('ttk.format')
@section('sub-title','hasil')

@section('isi')


@if(count($errors)>0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }} 
    </div>        
    @endforeach
@endif

    <div class="col-12 col-sm-12 col-lg-12">
      <div class="card">
        <article class="article article-style-b">
          <img src="{{ asset($post->gambar) }}"  style="width: 700px">       
          <div class="article-details">
            <div class="article-title">
               <h2><a href="#">{{ $post->judul }}</a></h2>              
            </div>
            <p class="lead mt-4">{{$post->content}}</p>
            <div class="article-cta">
              <a href="#">{{ $post->users->name }} <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>          
        </article>
      </div>
    </div>       
      
    

 @if (Session::has('success'))
 <div class="alert alert-success" role="alert">
     {{ Session('success') }}  
 </div>    
@endif

 <div class="row">
  <div class="col-12 col-sm-12 col-lg-5">
    <div class="card">
      
      <div class="card-body">
        <p>
          <a class="btn btn-primary collapsed" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Buat Komentar
          </a>          
        </p>
        <div class="collapse" id="collapseExample" style="">
          <div class="row">                     
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card">
               <form action="{{ url('blog/komentar') }}" id="komentar-utama" method="POST" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="posts_id" value="{{ $post->id }}">
                       <input type="hidden" name="parent" value="0">               
                 <div class="card-body">
                   <div class="form-group">
                     <label>Dikirim sebagai {{ Auth::user()->name }}</label>
                     <div>
                       <textarea type="textarea" class="form-control" name="konten" id="komentar-utama"></textarea>
                     </div>
                   </div>
                   <div class="col-sm-12 col-md-7">
                     <button type="submit" class="btn btn-primary">Kirim</button>
                   </div>
                 </div>
               </form>           
              </div>           
           </div>
          </div>    
        </div>
      </div>
    </div>
    </div>

 <div class="col-12 col-sm-12 col-lg-7">
   <div class="card">
     <div class="card-header">
       <h4>Kolom Komentar</h4>
     </div>
     <div class="card-body">
       <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
        @foreach ($post->komentar()->where('parent',0)->orderBy('created_at','desc')->get() as $komentar)
        <li class="media">
           <div class="media-body">
             <div class="media-right"><div class="text-primary">{{ $komentar->created_at->diffforHumans() }}</div></div>
             <div class="media-title mb-1">{{ $komentar->users->name }}</div>
             <div class="media-description text-muted">{{$komentar->konten}}</div>
             <div class="media-links">
              
              <form action="{{ url('komentar/clean', $komentar->id) }}" method="POST" onsubmit="return confirm('Yakin kan aku')">
                @csrf
                @method('delete')
                <button  type="submit" class="btn btn-danger btn-sm float-right"><i class="fa fa-window-close"></i></button>
              </form>
             
              <div class="card"> 
                <div class="card-body">
                  <p>
                    <a class="btn btn-primary collapsed" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                      Balas Komentar
                    </a>
                  </p>
                  <div class="row">
                    <div class="col">
                      <div class="multi-collapse collapse" id="multiCollapseExample1" style="">
                        <form action="{{ url('posts/komentar') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="posts_id" value="{{ $post->id }}">
                          <input type="hidden" name="parent" value="{{ $komentar->id }}">
                          <input type="text" name="konten" class="form-control">
                          <input type="submit" class="btn btn-info btn-xs" value="balas">
                        </form>                  
                      </div>
                    </div>                    
                  </div>
                </div>
              </div>
              
              

            <br>
            @foreach ($komentar->childs as $child)
              <p>
                <a href="#" class="text-primary">{{ $child->users->name }}</a>
                <span class="media-title"><i class="fas fa-share"></i>{{ $child->konten }}</span>
                <span class="text-small text-muted float-right">{{ $child->created_at->diffforHumans() }}</span>
              </p>
              @endforeach
           </div>
         </li>
         @endforeach
       </ul>
     </div>
   </div>
 </div>

 
</div>
 




@endsection