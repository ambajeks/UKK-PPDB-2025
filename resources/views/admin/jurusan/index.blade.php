@extends('layouts.admin')
@section('content')
  <div class="d-flex justify-content-between mb-3">
    <h3>Jurusan</h3>
    <a href="{{ route('admin.jurusan.create') }}" class="btn btn-primary">Tambah Jurusan</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Kode</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jurusan as $j)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $j->nama }}</td>
          <td>{{ $j->kode_jurusan }}</td>
          <td>
            <a href="{{ route('admin.jurusan.edit', $j) }}" class="btn btn-sm btn-warning">Edit</a>
            <!-- <form action="{{ route('admin.jurusan.destroy', $j) }}" method="POST" class="d-inline">@csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Hapus</button> -->
              <form id="delete-user-{{ $j->id }}" action="{{ route('admin.jurusan.destroy', $j) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger"
        onclick="if (confirm('Yakin ingin menghapus jurusan ini?')) document.getElementById('delete-user-{{ $j->id }}').submit();">
        Hapus
    </button>
</form>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  
@endsection