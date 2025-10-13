<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenPendaftaranTable extends Migration
{
    public function up()
    {
        Schema::create('dokumen_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formulir_id')->constrained('formulir_pendaftaran')->onDelete('cascade');
            $table->string('jenis_dokumen',50);
            $table->string('path_file',255);
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen_pendaftaran');
    }
}
