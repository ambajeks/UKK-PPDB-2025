@extends('layouts.admin')
@section('content')
<h3>Edit Jurusan</h3>
<form action="{{ route('admin.jurusan.update',$jurusan) }}" method="POST">@method('PUT') 
    @include('admin.jurusan._form')</form>
@endsection
