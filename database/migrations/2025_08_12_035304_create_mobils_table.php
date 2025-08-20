<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('merk_id')->constrained('merks')->onDelete('cascade');
            $table->foreignId('tipe_id')->constrained('tipes')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->integer('harga');
            $table->text('deskripsi')->nullable();  
            $table->enum('status', ['available', 'not_available'])->default('available');
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('no_plat')->nullable();
            $table->string('warna')->nullable();
            $table->string('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
