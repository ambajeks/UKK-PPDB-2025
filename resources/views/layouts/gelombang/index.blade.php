@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h3>Gelombang Pendaftaran</h3>
  @can('admin')
  <a href="{{ route('gelombang.create') }}" class="btn btn-primary">Buat Gelombang</a>
  @endcan
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th><th>Nama</th><th>Mulai</th><th>Selesai</th><th>Limit</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($gelombangs as $g)
    <tr>
      <td>{{ $g->id }}</td>
      <td>{{ $g->nama_gelombang }}</td>
      <td>{{ $g->tanggal_mulai }}</td>
      <td>{{ $g->tanggal_selesai }}</td>
      <td>{{ $g->limit_siswa }}</td>
      <td>
        <a href="{{ route('gelombang.show',$g) }}" class="btn btn-sm btn-info">Lihat</a>
        @can('admin')
        <a href="{{ route('gelombang.edit',$g) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('gelombang.destroy',$g) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
        @endcan
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $gelombangs->links() }}
@endsection
