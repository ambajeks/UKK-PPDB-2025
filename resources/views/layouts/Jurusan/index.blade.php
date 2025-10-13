@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h3>Jurusan</h3>
  <a href="{{ route('jurusan.create') }}" class="btn btn-primary">Tambah Jurusan</a>
</div>
<table class="table table-striped">
<thead><tr><th>#</th><th>Nama</th><th>Kode</th><th>Aksi</th></tr></thead>
<tbody>
@foreach($jurusans as $j)
<tr>
  <td>{{ $j->id }}</td>
  <td>{{ $j->nama }}</td>
  <td>{{ $j->kode_jurusan }}</td>
  <td>
    <a href="{{ route('jurusan.show',$j) }}" class="btn btn-sm btn-info">Lihat</a>
    <a href="{{ route('jurusan.edit',$j) }}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{ route('jurusan.destroy',$j) }}" method="POST" class="d-inline">@csrf @method('DELETE')
      <button class="btn btn-sm btn-danger">Hapus</button>
    </form>
  </td>
</tr>
@endforeach
</tbody>
</table>
{{ $jurusans->links() }}
@endsection

