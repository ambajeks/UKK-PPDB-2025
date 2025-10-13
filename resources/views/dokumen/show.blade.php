{{-- index --}}
@extends('layouts.app')
@section('content')
<h3>Dokumen Pendaftaran</h3>
<a href="{{ route('dokumen.create') }}" class="btn btn-primary mb-3">Upload Dokumen</a>
<table class="table table-striped">
<thead><tr><th>#</th><th>Jenis</th><th>File</th><th>Aksi</th></tr></thead>
<tbody>
@foreach($dokumens as $d)
<tr>
  <td>{{ $d->id }}</td>
  <td>{{ $d->jenis_dokumen }}</td>
  <td><a href="{{ asset('storage/'.$d->path_file) }}" target="_blank">Lihat</a></td>
  <td>
    <form action="{{ route('dokumen.destroy',$d) }}" method="POST">@csrf @method('DELETE')
      <button class="btn btn-sm btn-danger">Hapus</button>
    </form>
  </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
