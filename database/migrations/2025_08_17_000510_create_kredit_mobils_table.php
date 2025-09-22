<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kredit_mobils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobil_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->date('tanggal_kredit');
            $table->decimal('dp', 15, 2);
            $table->enum('metode_pembayaran', ['dana', 'gopay', 'ovo', 'bca']);
            $table->string('jatoh_tempo');
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->timestamps();
            $table->foreign('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kredit_mobil');
    }
};
