@extends('layouts.app')
@section('content')
<h3>Tambah Jurusan</h3>
<form action="{{ route('jurusan.store') }}" method="POST">@include('jurusan._form')</form>
@endsection
