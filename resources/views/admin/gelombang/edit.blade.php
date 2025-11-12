@extends('layouts.app')
@section('content')
<h3>Edit Gelombang</h3>
<form action="{{ route('gelombang.update', $gelombang) }}" method="POST">
  @method('PUT')
  @include('gelombang._form')
</form>
@endsection
