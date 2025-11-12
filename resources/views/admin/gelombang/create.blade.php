@extends('layouts.app')
@section('content')
<h3>Buat Gelombang</h3>
<form action="{{ route('gelombang.store') }}" method="POST">
  @include('gelombang._form')
</form>
@endsection
