@extends('tta.format')
@section('sub-judul','Edit Pengguna')
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

<form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="name" value="{{ $users->name }}">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" value="{{ $users->email }}">
</div>

<div class="form-group">
    <label>Tipe</label>
    <select class="form-control" name="tipe">
        <option value="" holder>Pilih Tipe Pengguna</option>
        <option value="1" holder
        @if ($users->tipe == 1)
            selected
        @endif
        >Administrator</option>
        <option value="0" holder
        @if ($users->tipe == 0)
            selected
        @endif
        >Client</option>
    </select>
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input class="form-control" type="password" class="form-control" name="password">
</div>

<div class="form-group">
    <a href="{{ url('users') }}" class="btn btn-warning">Batal</a>
    <button class="btn btn-primary">Update Pengguna</button>    
</div>
</form>

@endsection