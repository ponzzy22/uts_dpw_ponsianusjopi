@extends('tta.format')
@section('sub-judul','Edit Kategori')
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

<form action="{{ route('category.update', $category->id) }}" method="POST">
@csrf
@method('patch')
<div class="form-group">
    <label>Ubah Kategori </label>
    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
</div>
<div class="form-group">
    <a href="{{ url('category') }}" class="btn btn-warning">Batal</a>
    <button class="btn btn-primary">Update Kategori</button>
</div>
</form>
@endsection