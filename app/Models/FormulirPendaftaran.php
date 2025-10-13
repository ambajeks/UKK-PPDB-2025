<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormulirPendaftaran extends Model
{
   protected $table = 'formulir_pendaftaran';
    protected $fillable = [
        'user_id','nomor_pendaftaran','nama_lengkap','nisn','asal_sekolah','tempat_lahir','tanggal_lahir',
        'agama','nik','anak_ke','alamat','desa','kelurahan','kecamatan','kota','no_hp','gelombang_id'
    ];

    public function user(){ return $this->belongsTo(User::class,'user_id'); }
    public function gelombang(){ return $this->belongsTo(GelombangPendaftaran::class,'gelombang_id'); }
    public function dokumens(){ return $this->hasMany(DokumenPendaftaran::class,'formulir_id'); }
    public function orangTua(){ return $this->hasOne(OrangTua::class,'formulir_id'); }
    public function wali(){ return $this->hasOne(Wali::class,'formulir_id'); }
    public function pembayarans(){ return $this->hasMany(Pembayaran::class,'formulir_id'); }
}
