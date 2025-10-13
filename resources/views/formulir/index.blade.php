@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h3>Formulir Saya</h3>
  <a href="{{ route('formulir.create') }}" class="btn btn-primary">Buat Formulir</a>
</div>

<table class="table table-striped">
  <thead><tr><th>#</th><th>Nomor</th><th>Nama</th><th>Gelombang</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($forms as $f)
    <tr>
      <td>{{ $f->id }}</td>
      <td>{{ $f->nomor_pendaftaran }}</td>
      <td>{{ $f->nama_lengkap }}</td>
      <td>{{ $f->gelombang->nama_gelombang ?? '-' }}</td>
      <td>
        <a href="{{ route('formulir.show',$f) }}" class="btn btn-sm btn-info">Lihat</a>
        <a href="{{ route('formulir.edit',$f) }}" class="btn btn-sm btn-warning">Edit</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $forms->links() }}
@endsection
