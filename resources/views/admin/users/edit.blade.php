@extends('layouts.admin')

@section('content')
<h3>Edit Peran Pengguna</h3>

<form action="{{ route('admin.users.update', $user) }}" method="POST">
    @method('PUT')
    @csrf

    @foreach($roles as $r)
        <div class="form-check">
            <input 
                class="form-check-input" 
                type="radio" 
                name="role_id" 
                id="role_{{ $r->id }}" 
                value="{{ $r->id }}" 
                {{ $user->roles->contains($r->id) ? 'checked' : '' }}>
            
            <label class="form-check-label" for="role_{{ $r->id }}">
                {{ $r->display_name ?? $r->name }}
            </label>
        </div>
    @endforeach

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
