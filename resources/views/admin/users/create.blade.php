@extends('tta.format')
@section('sub-judul','Tambah Pengguna')
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

<form action="{{ route('users.store') }}" method="POST">
@csrf
<div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="name">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email">
</div>

<div class="form-group">
    <label>Tipe</label>
    <select class="form-control" name="tipe">
        <option value="" holder>Pilih Tipe Pengguna</option>
        <option value="1" holder>Administrator</option>
        <option value="0" holder>Client</option>
    </select>
</div>

<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password">
</div>

<div class="form-group">
    <a href="{{ url('users') }}" class="btn btn-warning">Batal</a>
    <button class="btn btn-primary">Simpan Pengguna</button>    
</div>
</form>

@endsection