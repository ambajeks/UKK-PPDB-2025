@extends('layouts.admin')

@section('title', 'Data Kelas')

@section('content')
<div class="container">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-collection me-2"></i>Data Kelas</h5>
            <a href="#" class="btn btn-light btn-sm text-primary fw-semibold">
                <i class="bi bi-plus-circle"></i> Tambah Kelas
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th width="5%">#</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td>X RPL 1</td>
                        <td>RPL</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
