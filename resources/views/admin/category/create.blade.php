@extends('tta.format')
@section('sub-judul','Tambah Kategori')
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

<form action="{{ route('category.store') }}" method="POST">
@csrf
<div class="form-group">
    <label>Kategori</label>
    <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
    <a href="{{ url('category') }}" class="btn btn-warning">Batal</a>
    <button class="btn btn-primary">Simpan Kategori</button>    
</div>
</form>

@endsection