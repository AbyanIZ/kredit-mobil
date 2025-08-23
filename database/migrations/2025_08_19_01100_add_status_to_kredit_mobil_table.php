<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kredit_mobil', function (Blueprint $table) {
            $table->enum('status', ['pending', 'done', 'reject'])->default('pending'); // status pengajuan kredit
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');    // status pembayaran
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kredit_mobil', function (Blueprint $table) {
            $table->dropColumn(['status', 'payment_status']);
        });
    }
};
