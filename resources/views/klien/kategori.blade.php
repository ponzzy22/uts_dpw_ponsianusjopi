@extends('ttk.format')
@section('isi')

<div class="card">
    <div class="card-header">
      <h4>Kategori</h4>
    </div>
    <div class="card-body">

    @foreach ($category as $hasil)                
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{ $hasil->name }}
          <span class="badge badge-primary badge-pill">{{ $hasil->post->count() }}</span>
        </li>       
      </ul>
    @endforeach
    
    </div>
  </div>

@endsection