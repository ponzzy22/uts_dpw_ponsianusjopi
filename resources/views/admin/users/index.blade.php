@extends('tta.format')
@section('sub-judul','Daftar Pengguna')
@section('isi')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}  
    </div>    
@endif

    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm "><i class="fas fa-plus">Tambah Pengguna</i></a>

    <form action="{{ route('users.index') }}" class="form-inline ml-auto">
        <input class="form-control" type="search" placeholder="Nama..." aria-label="Search" data-width="250" name="cari">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
    </form>

<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tipe</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($users as $result =>$hasil)
        <tr>
            <td>{{ $hasil->id }}</td>
            <td>{{ $hasil->name }}</td>
            <td>{{ $hasil->email }}</td>
            <td>
                @if ($hasil->tipe)
                <span class="badge badge-info">Administrator</span>
                    @else 
                    <span class="badge badge-warning">Client</span>
                @endif
            </td>
            <td>
            <form action="{{ route('users.destroy', $hasil->id) }}" method="POST" onsubmit="return confirm('Apa anda yakin akan menghapus Kategori ini (Yakinkan lah aku)')" >
                @csrf
                @method('delete')
                <a href="{{ route('users.edit', $hasil->id) }}" class="btn btn-dark btn-sm">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{-- {{ $users->links() }}/ --}}

@endsection
