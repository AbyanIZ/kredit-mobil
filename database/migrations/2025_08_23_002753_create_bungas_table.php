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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kredit_mobil_id')->constrained('kredit_mobil')->onDelete('cascade');
            $table->decimal('bunga', 5, 2);
            $table->datetime('tanggal_bayar')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->enum('status', ['pending', ''])->default('pending');
            $table->string('reason');
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
