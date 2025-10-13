@extends('layouts.app')
@section('content')
<h3>Edit Jurusan</h3>
<form action="{{ route('jurusan.update',$jurusan) }}" method="POST">@method('PUT') @include('jurusan._form')</form>
@endsection
