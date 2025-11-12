@csrf
<div class="mb-3">
  <label>Nama Jurusan</label>
  <input type="text" name="nama" class="form-control" value="{{ old('nama',$jurusan->nama??'') }}" required>
</div>
<div class="mb-3">
  <label>Kode Jurusan</label>
  <input type="text" name="kode_jurusan" class="form-control" value="{{ old('kode_jurusan',$jurusan->kode_jurusan??'') }}" required>
</div>
<button class="btn btn-primary">Simpan</button>
<a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Kembali</a>
