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
        Schema::create('bungas', function (Blueprint $table) {
            $table->id();

            // Relasi ke user & kredit mobil
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kredit_mobil_id')->constrained('kredit_mobils')->onDelete('cascade');

            // Data bunga
            $table->decimal('bunga', 5, 2); // contoh: 2.50 (%)
            $table->dateTime('tanggal_bayar')->nullable();
            $table->decimal('total', 15, 2)->nullable();

            // Status pembayaran bunga
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');

            // Alasan (jika gagal/reject)
            $table->string('reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bungas');
    }
};
