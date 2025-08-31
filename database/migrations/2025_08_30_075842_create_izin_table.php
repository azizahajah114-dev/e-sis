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
        Schema::create('izin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('id_pemberi_izin')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('id_walikelas')->nullable()->constrained('walikelas')->nullOnDelete();
            $table->enum('jenis_izin', ['sakit', 'izin']);
            $table->text('keterangan')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->date('tanggal');
            $table->enum('status_izin', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->foreignId('disetujui_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin');
    }
};
