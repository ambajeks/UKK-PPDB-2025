@extends('layouts.admin')

@section('title', 'Data Users')

@section('content')
    <div class="container">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-people-fill me-2"></i>Data Users</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection