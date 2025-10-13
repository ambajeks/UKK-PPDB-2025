<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliTable extends Migration
{
    public function up()
    {
        Schema::create('wali', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formulir_id')->unique()->constrained('formulir_pendaftaran')->onDelete('cascade');
            $table->string('nama_wali',100)->nullable();
            $table->text('alamat_wali')->nullable();
            $table->string('no_hp_wali',20)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wali');
    }
}
