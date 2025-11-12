@extends('layouts.admin')
@section('content')
<h3>Tambah Jurusan</h3>
<form action="{{ route('admin.jurusan.store') }}" method="POST">@include('admin.jurusan._form')</form>
@endsection

