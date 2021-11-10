@extends('tta.format')
@section('sub-judul','Daftar Kategori')
@section('isi')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}  
    </div>    
@endif

<a href="{{ route('category.create') }}" class="btn btn-success btn-sm ">Tambah Kategori</a>
<br><br>

<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
            <th>Dibuat</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($category as $hasil)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $hasil->name }}</td>
            <td>
            <form action="{{ route('category.destroy', $hasil->id) }}" method="POST" onsubmit="return confirm('Apa anda yakin akan menghapus Kategori ini (Yakinkan lah aku)')" >
                @csrf
                @method('delete')
                <a href="{{ route('category.edit', $hasil->id) }}" class="btn btn-dark btn-sm">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
        <td>{{ $hasil->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $category->links() }}

@endsection
