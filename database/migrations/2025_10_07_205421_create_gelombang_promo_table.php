<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGelombangPromoTable extends Migration
{
    public function up()
    {
        Schema::create('gelombang_promo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gelombang_id')->constrained('gelombang_pendaftaran')->onDelete('cascade');
            $table->foreignId('promo_id')->constrained('promo')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['gelombang_id','promo_id'],'gelombang_promo_index_0');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gelombang_promo');
    }
}
