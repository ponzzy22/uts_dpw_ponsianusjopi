@extends('tta.format')
@section('sub-judul','Edit Artikel')
@section('isi')

@if(count($errors)>0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }} 
    </div>        
    @endforeach
@endif
    
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}  
    </div>    
@endif

<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="form-group">
    <label>Ubah Artikel </label>
    <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
</div>
<div class="form-group">
    <label>Kategori</label>
    <select class="form-control" name="category_id">
        <option value="" holder>pilih</option>

        @foreach ($category as $result)
            <option value="{{ $result->id }}"
                @if ($post->category_id == $result->id)
                    selected
                @endif>{{ $result->name }}
            </option> 
        @endforeach         
          
    </select>    
</div>
<div class="form-group">
    <label>Konten</label>
    <textarea class="form-control" name="content" >{{ $post->content }}</textarea>
</div>
<div class="form-group">
    <label>Thumbnail</label>
    <input type="file" class="form-control" name="gambar">
</div>

<div class="form-group">
    <a href="{{ url('posts') }}" class="btn btn-warning">Batal</a>
    <button class="btn btn-primary">Update Artikel</button>
</div>
</form>
@endsection