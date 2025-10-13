@extends('layouts.app')
@section('content')
<h3>Detail Jurusan</h3>
<table class="table">
<tr><th>Nama</th><td>{{ $jurusan->nama }}</td></tr>
<tr><th>Kode</th><td>{{ $jurusan->kode_jurusan }}</td></tr>
</table>
<a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
