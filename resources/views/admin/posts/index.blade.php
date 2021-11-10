@extends('tta.format')
@section('sub-judul','Daftar Artikel')
@section('isi')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}  
    </div>    
@endif

@if(count($errors)>0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }} 
    </div>        
    @endforeach
@endif
    
<a href="{{ route('posts.create') }}" class="btn btn-success btn-sm ">Tambah Artikel</a>

<br><br>

{{-- TABEL ARTIKEL --}}
<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Artikel</th>
            <th>Kategori</th>
            <th>Kreator</th>
            <th>Thumbnail</th>
            <th>Action</th>
            <th>Dibuat</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($post as $result =>$hasil)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $hasil->judul }}</td>
            <td>{{ $hasil->category->name }}</td>
            <td>{{ $hasil->users->name }}</td>
            <td><img src="{{ asset($hasil->gambar) }}" class="img-fluid" style="width: 100px"></td>
            <td>
            <form action="{{ route('posts.destroy', $hasil->id) }}" method="POST" onsubmit="return confirm('Apa anda yakin akan menghapus Artikel ini (Yakinkan lah aku)')">
                @csrf
                @method('delete')
                <a href="{{ route('posts.edit', $hasil->id) }}" class="btn btn-dark btn-sm">Edit</a>
                <a href="{{ route('posts.show', $hasil->id) }}" class="btn btn-info btn-sm">Detail</a>
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form> </td>
            <td>{{ $hasil->created_at->diffforHumans() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $post->links() }}

@endsection
