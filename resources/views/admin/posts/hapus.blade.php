@extends('tta.format')
@section('sub-judul','Tempat Sampah Artikel')
@section('isi')

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}  
    </div>    
@endif


<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Arikel</th>
            <th>Kategori</th>
            <th>Kreator</th>
            <th>Thumbnail</th>
            <th>Dibuat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($post as $result =>$hasil)
        <tr>
            <td>{{ $result + $post->firstitem() }}</td>
            <td>{{ $hasil->judul }}</td>
            <td>{{ $hasil->category->name }}</td>
            <td>{{ $hasil->users->name }}</td>
            <td><img src="{{ asset($hasil->gambar) }}" class="img-fluid" style="width: 100px"></td>
            <td>{{ $hasil->created_at }}</td>
            <td>
            <form action="{{ url('posts/kill', $hasil->id) }}" method="POST" onsubmit="return confirm('Yakin kan aku')">
                @csrf
                @method('delete')
                <a href="{{ url('posts/restore', $hasil->id) }}" class="btn btn-info btn-sm">Restore</a>
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $post->links() }}


@endsection
