@extends('layouts.app')
@section('content')
<h3>Edit Peran Pengguna</h3>
<form action="{{ route('users.update',$user) }}" method="POST">@method('PUT') @csrf
@foreach($roles as $r)
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $r->id }}" {{ $user->roles->contains($r->id)?'checked':'' }}>
  <label class="form-check-label">{{ $r->display_name ?? $r->name }}</label>
</div>
@endforeach
<button class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
